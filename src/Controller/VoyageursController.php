<?php

namespace App\Controller;

use App\Service\AuthService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\OffreRepository;

use App\Repository\SocialMediaRepository;
use Knp\Component\Pager\PaginatorInterface;

use App\Repository\BonPlanRepository;
use App\Entity\BonPlan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use App\Repository\ExpenseRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ReservationRepository;

use App\Service\WeatherService;
use Psr\Log\LoggerInterface;

class VoyageursController extends AuthenticatedController
{
    public function __construct(AuthService $authService)
    {
        parent::__construct($authService);
    }

    #[Route('/dashboardVoyageursPage', name: 'dashboardVoyageurs_page')]
    public function dashboardVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Check if user has the right role
        if (!$this->hasRole('Voyageurs')) {
            // Redirect to appropriate dashboard based on role
            $userRole = $this->authService->getUserRole();
            if ($userRole === 'Admin' || $userRole === 'ROLE_ADMIN') {
                return $this->redirectToRoute('app_dash');
            } elseif ($userRole === 'Entreprise') {
                return $this->redirectToRoute('app_dashEntreprise');
            }
        }
        
        return $this->render('dashVoyageurs/dashboardVoyageurs.html.twig');
    }

    #[Route('/UserVoyageursPage', name: 'userVoyageurs_page')]
    public function UserVoyageursPage(ExpenseRepository $expenseRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Error handling for missing user
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // If admin, show all expenses, otherwise only user's expenses
        $expenses = ($user && $user->getRoleUser() === 'Admin') 
            ? $expenseRepository->findAll() 
            : $expenseRepository->findBy(['user' => $user]);
        
        return $this->render('expense/index.html.twig', [
            'expenses' => $expenses,
            'in_voyageurs_dashboard' => true
        ]);
    }

    #[Route('/StationVoyageursPage', name: 'stationVoyageurs_page')]
    public function stationVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        return $this->render('dashVoyageurs/stationPageVoyageurs.html.twig');
    }

    #[Route('/BonplanVoyageursPage', name: 'bonplanVoyageurs_page')]
    public function bonplanVoyageursPage(BonPlanRepository $bonPlanRepository, EntityManagerInterface $entityManager, WeatherService $weatherService)
    {
        // Récupérer tous les bons plans
        $bonplans = $bonPlanRepository->findAll();
        
        // Récupérer les notes moyennes pour chaque bon plan
        $ratings = [];
        $reviewsCount = [];
        $reviewsByBonPlan = [];
        $weatherData = [];
        $weatherRecommendations = [];
        $seasonalActivities = [];
        
        foreach ($bonplans as $bonplan) {
            // Requête pour calculer la note moyenne
            $averageRating = $entityManager->createQuery(
                'SELECT AVG(r.rating) as average
                FROM App\Entity\ReviewBonPlan r
                WHERE r.bonPlan = :bonplanId'
            )
            ->setParameter('bonplanId', $bonplan->getIdP())
            ->getSingleScalarResult();
            
            // Requête pour compter le nombre d'avis
            $count = $entityManager->createQuery(
                'SELECT COUNT(r.idR) as count
                FROM App\Entity\ReviewBonPlan r
                WHERE r.bonPlan = :bonplanId'
            )
            ->setParameter('bonplanId', $bonplan->getIdP())
            ->getSingleScalarResult();
            
            // Récupérer tous les avis pour ce bon plan
            $reviews = $entityManager->createQuery(
                'SELECT r
                FROM App\Entity\ReviewBonPlan r
                WHERE r.bonPlan = :bonplanId
                ORDER BY r.idR DESC'
            )
            ->setParameter('bonplanId', $bonplan->getIdP())
            ->getResult();
            
            // Récupérer les données météo pour la localisation du bon plan
            try {
                $weather = $weatherService->getCurrentWeather($bonplan->getLocalisation());
                $weatherData[$bonplan->getIdP()] = $weather;
                $weatherRecommendations[$bonplan->getIdP()] = $weatherService->getWeatherRecommendation($weather);
                $seasonalActivities[$bonplan->getIdP()] = $weatherService->isSeasonalActivity($bonplan->getTypePlace());
            } catch (\Exception $e) {
                // En cas d'erreur, on met des valeurs par défaut
                $weatherData[$bonplan->getIdP()] = null;
                $weatherRecommendations[$bonplan->getIdP()] = 'unknown';
                $seasonalActivities[$bonplan->getIdP()] = false;
            }
            
            // Stocker les résultats
            $ratings[$bonplan->getIdP()] = $averageRating ? round($averageRating, 1) : 0;
            $reviewsCount[$bonplan->getIdP()] = $count;
            $reviewsByBonPlan[$bonplan->getIdP()] = $reviews;
        }
        
        // Passer les bons plans et les notes moyennes à la vue
        return $this->render('dashVoyageurs/bonplanPageVoyageurs.html.twig', [
            'bonplans' => $bonplans,
            'ratings' => $ratings,
            'reviewsCount' => $reviewsCount,
            'reviewsByBonPlan' => $reviewsByBonPlan,
            'weatherData' => $weatherData,
            'weatherRecommendations' => $weatherRecommendations,
            'seasonalActivities' => $seasonalActivities
        ]);
    }

    #[Route('/BonplanCalendar', name: 'bonplan_calendar')]
    public function bonplanCalendar(): Response
    {
        // Cette fonctionnalité est purement frontend (stockage local)
        // et n'utilise pas la base de données
        return $this->render('bonplan_calendar/bonplan_calendar.html.twig');
    }

    #[Route('/OffreVoyageursPage', name: 'offreVoyageurs_page')]
    public function offreVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig');
    }

    #[Route('/SocialVoyageursPage', name: 'socialVoyageurs_page')]
    public function socialVoyageursPage(Request $request, SocialMediaRepository $socialMediaRepository, PaginatorInterface $paginator)
    {
        // Récupérer toutes les publications
        $query = $socialMediaRepository->createQueryBuilder('s')
            ->leftJoin('s.user', 'u')
            ->select('s', 'u')
            ->orderBy('s.publicationDate', 'DESC')
            ->getQuery();
            
        // Paginer les résultats
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), // Numéro de page, 1 par défaut
            6 // Nombre d'éléments par page
        );
            
        // Passer les publications paginées à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig', [
            'publications' => $pagination
        ]);
    }
    
    #[Route('/OffreForm', name: 'offre_form')]
    public function offreForm(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        return $this->render('dashVoyageurs/offreForm.html.twig');
    }

    #[Route('/BonplanForm', name: 'bonplan_form')]
    public function bonplanForm(): Response
    {
        return $this->render('dashVoyageurs/bonplanForm.html.twig');
    }

    #[Route('/bonplan/add', name: 'bonplan_add', methods: ['POST'])]
    public function bonplanAdd(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): JsonResponse
    {
        try {
            // Récupérer les données du formulaire
            $nomplace = $request->request->get('nomplace');
            $localisation = $request->request->get('localisation');
            $description = $request->request->get('description');
            $typePlace = $request->request->get('typePlace');
            $imageBP = $request->files->get('imageBP');

            // Créer un nouveau BonPlan
            $bonplan = new BonPlan();
            $bonplan->setNomplace($nomplace);
            $bonplan->setLocalisation($localisation);
            $bonplan->setDescription($description);
            $bonplan->setTypePlace($typePlace);
            $bonplan->setIdU(1); // TODO: Récupérer l'ID de l'utilisateur connecté

            // Valider l'entité
            $errors = $validator->validate($bonplan);
            if (count($errors) > 0) {
                $errorMessages = [];
                foreach ($errors as $error) {
                    $errorMessages[] = $error->getMessage();
                }
                return new JsonResponse(['error' => $errorMessages], 400);
            }

            // Validation de l'image
            if ($imageBP) {
                $allowedMimeTypes = ['image/jpeg', 'image/png'];
                if (!in_array($imageBP->getMimeType(), $allowedMimeTypes)) {
                    return new JsonResponse(['error' => ['Format d\'image non supporté. Utilisez JPEG ou PNG']], 400);
                }

                // Vérification de la taille de l'image (max 5MB)
                if ($imageBP->getSize() > 5 * 1024 * 1024) {
                    return new JsonResponse(['error' => ['L\'image ne doit pas dépasser 5MB']], 400);
                }

                // Génération d'un nom unique pour l'image
                $newFilename = uniqid() . '.' . $imageBP->guessExtension();
                $uploadDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/bonplans/';

                // Vérification et création du répertoire si nécessaire
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                // Déplacement de l'image
                try {
                    $imageBP->move($uploadDirectory, $newFilename);
                    $bonplan->setImageBP($newFilename);
                } catch (FileException $e) {
                    return new JsonResponse(['error' => ['Erreur lors de l\'upload de l\'image']], 500);
                }
            } else {
                // Si aucune image n'est fournie, utiliser une image par défaut
                $bonplan->setImageBP('default.jpg');
            }

            // Sauvegarder dans la base de données
            $entityManager->persist($bonplan);
            $entityManager->flush();

            return new JsonResponse(['success' => true, 'message' => 'Bon plan ajouté avec succès']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => ['Une erreur est survenue lors de l\'ajout du bon plan']], 500);
        }
    }

    #[Route('/debug-bonplan', name: 'debug_bonplan')]
    public function debugBonplan(EntityManagerInterface $entityManager): Response
    {
        try {
            // Get the database connection
            $conn = $entityManager->getConnection();
            
            // Get table structure
            $sql = "DESCRIBE bonplan";
            $stmt = $conn->prepare($sql);
            $result = $stmt->executeQuery();
            $columns = $result->fetchAllAssociative();
            
            // Get some data
            $sql = "SELECT * FROM bonplan LIMIT 1";
            $stmt = $conn->prepare($sql);
            $result = $stmt->executeQuery();
            $data = $result->fetchAllAssociative();
            
            return $this->json([
                'columns' => $columns,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    #[Route('/BonplanEdit/{idP}', name: 'bonplan_edit_form')]
    public function bonplanEditForm(BonPlan $bonPlan): Response
    {
        return $this->render('dashVoyageurs/bonplanEditForm.html.twig', [
            'bonplan' => $bonPlan
        ]);
    }

    #[Route('/BonplanUpdate/{idP}', name: 'bonplan_update', methods: ['POST'])]
    public function bonplanUpdate(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        try {
            // Update data from form
            $bonPlan->setNomplace($request->request->get('nomplace'));
            $bonPlan->setLocalisation($request->request->get('localisation'));
            $bonPlan->setDescription($request->request->get('description'));
            $bonPlan->setTypePlace($request->request->get('typePlace'));
            
            // Handle image upload
            $imageFile = $request->files->get('imageBP');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                // Move the file to the uploads directory
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), 
                        $newFilename
                    );
                    
                    // Delete old image if it's not the default
                    $oldImage = $bonPlan->getImageBP();
                    if ($oldImage && $oldImage != 'default.jpg') {
                        $oldImagePath = $this->getParameter('uploads_directory') . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    
                    $bonPlan->setImageBP($newFilename);
                } catch (FileException $e) {
                    return $this->json([
                        'success' => false,
                        'message' => 'Erreur lors de l\'upload de l\'image: ' . $e->getMessage()
                    ], 500);
                }
            }
            
            // Save to database
            $entityManager->flush();
            
            // Return JSON response for AJAX handling
            return $this->json([
                'success' => true,
                'message' => 'Bon plan modifié avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/BonplanDelete/{idP}', name: 'bonplan_delete', methods: ['POST'])]
    public function bonplanDelete(BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        try {
            // Vérifier si le bon plan existe
            if (!$bonPlan) {
                return $this->json([
                    'success' => false,
                    'message' => 'Bon plan non trouvé'
                ], 404);
            }

            // Supprimer l'image associée si elle existe
            $image = $bonPlan->getImageBP();
            if ($image && $image != 'default.jpg') {
                $imagePath = $this->getParameter('uploads_directory') . '/' . $image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            // Supprimer le bon plan de la base de données
            $entityManager->remove($bonPlan);
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'message' => 'Bon plan supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/voyageurs/offres', name: 'app_offre_voyageurs')]
    public function offrePageVoyageurs(OffreRepository $offreRepository): Response
    {
        // Récupérer toutes les offres depuis le repository
        $offres = $offreRepository->findAll();

        // Rendre la vue avec les offres
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig', [
            'offres' => $offres,
        ]);
    }

    #[Route('/profileVoyageursPage', name: 'profileVoyageurs_page')]
    public function profileVoyageursPage(UserRepository $userRepository, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            return $this->render('dashVoyageurs/error.html.twig', [
                'error' => 'User not found. Please log in again.'
            ]);
        }
        
        return $this->render('dashVoyageurs/profileVoyageursPage.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/profileVoyageursEdit', name: 'profileVoyageurs_edit')]
    public function profileVoyageursEdit(UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            return $this->render('dashVoyageurs/error.html.twig', [
                'error' => 'User not found. Please log in again.'
            ]);
        }
        
        return $this->render('dashVoyageurs/profileVoyageursEdit.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/update-profile-image', name: 'update_profile_image_ajax', methods: ['POST'])]
    public function updateProfileImage(Request $request, UserRepository $userRepository, 
                                       SessionInterface $session, EntityManagerInterface $entityManager,
                                       SluggerInterface $slugger): JsonResponse
    {
        try {
            // Check if user is logged in
            if (!$session->has('user_id')) {
                return $this->json([
                    'success' => false,
                    'message' => 'You must be logged in to update your profile image.'
                ], 401);
            }
            
            // Get current user
            $userId = $session->get('user_id');
            $user = $userRepository->find($userId);
            
            if (!$user) {
                return $this->json([
                    'success' => false,
                    'message' => 'User not found. Please log in again.'
                ], 404);
            }
            
            // Get uploaded file
            $imageFile = $request->files->get('profile_image');
            
            if (!$imageFile) {
                return $this->json([
                    'success' => false,
                    'message' => 'No image file provided.'
                ], 400);
            }
            
            // Validate file type
            $mimeType = $imageFile->getMimeType();
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            
            if (!in_array($mimeType, $allowedTypes)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Invalid file type. Allowed types: JPG, PNG, GIF, WEBP.'
                ], 400);
            }
            
            // Validate file size (max 5MB)
            if ($imageFile->getSize() > 5 * 1024 * 1024) {
                return $this->json([
                    'success' => false,
                    'message' => 'File is too large. Maximum size is 5MB.'
                ], 400);
            }
            
            // Process the uploaded file
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            
            // Move the file to the uploads directory
            try {
                // Use the absolute path to the images_users directory
                $uploadsDirectory = 'C:/xampp/htdocs/images_users';
                
                // Make sure the directory exists
                if (!file_exists($uploadsDirectory) && !is_dir($uploadsDirectory)) {
                    mkdir($uploadsDirectory, 0755, true);
                }
                
                // Delete old profile image if it exists and is not the default
                $oldFilename = $user->getImagesU();
                if ($oldFilename && $oldFilename !== 'default.jpg' && $oldFilename !== 'user-avatar.svg') {
                    $oldFilePath = $uploadsDirectory . '/' . $oldFilename;
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
                
                $imageFile->move($uploadsDirectory, $newFilename);
                
                // Copy the image to the public web directory to make it accessible
                $publicDir = $this->getParameter('kernel.project_dir') . '/public/images_users';
                if (!file_exists($publicDir) && !is_dir($publicDir)) {
                    mkdir($publicDir, 0755, true);
                }
                
                // Copy the file to public directory so it's accessible via web
                if (file_exists($uploadsDirectory . '/' . $newFilename)) {
                    copy($uploadsDirectory . '/' . $newFilename, $publicDir . '/' . $newFilename);
                }
                
                // Update user profile image
                $user->setImagesU($newFilename);
                $entityManager->flush();
                
                return $this->json([
                    'success' => true,
                    'message' => 'Profile image updated successfully',
                    'image_path' => '/images_users/' . $newFilename
                ]);
                
            } catch (FileException $e) {
                return $this->json([
                    'success' => false,
                    'message' => 'Error uploading file: ' . $e->getMessage()
                ], 500);
            }
            
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    // Add this new method to serve user profile images
    #[Route('/profile-image/{filename}', name: 'app_profile_image', requirements: ['filename' => '.+'])]
    public function serveProfileImage(?string $filename = null): Response
    {
        // Si filename est null ou vide, utiliser l'image par défaut
        if (!$filename) {
            $defaultImagePath = $this->getParameter('kernel.project_dir') . '/public/images/user-avatar.svg';
            if (file_exists($defaultImagePath)) {
                return new BinaryFileResponse($defaultImagePath);
            }
        }

        // Check in public directory first (web accessible)
        $publicImagesDir = $this->getParameter('kernel.project_dir') . '/public/images_users';
        $filePath = $publicImagesDir . '/' . $filename;
        
        // If not in public directory, check the C:/xampp/htdocs/images_users directory
        if (!file_exists($filePath)) {
            $externalImagesDir = 'C:/xampp/htdocs/images_users';
            $filePath = $externalImagesDir . '/' . $filename;
        }
        
        // If still not found, return default image
        if (!file_exists($filePath)) {
            $defaultImagePath = $this->getParameter('kernel.project_dir') . '/public/images/user-avatar.svg';
            if (file_exists($defaultImagePath)) {
                return new BinaryFileResponse($defaultImagePath);
            }
            throw new NotFoundHttpException('Profile image not found');
        }
        
        // Create a response with appropriate headers
        $response = new BinaryFileResponse($filePath);
        $response->headers->set('Content-Type', mime_content_type($filePath));
        $response->headers->set('Cache-Control', 'public, max-age=86400'); // Cache for 24 hours
        
        return $response;
    }

    #[Route('/dashboardVoyageurs', name: 'app_dashboard_voyageurs')]
    public function dashboardVoyageurs(ReservationRepository $reservationRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Check if user has the right role
        if (!$this->hasRole('Voyageurs')) {
            // Redirect to appropriate dashboard based on role
            $userRole = $this->authService->getUserRole();
            if ($userRole === 'Admin' || $userRole === 'ROLE_ADMIN') {
                return $this->redirectToRoute('app_dash');
            } elseif ($userRole === 'Entreprise') {
                return $this->redirectToRoute('app_dashEntreprise');
            }
        }

        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }

        // Get user's reservations
        $reservations = $reservationRepository->findBy(['user' => $user]);

        // Calculate statistics
        $totalTrips = count($reservations);
        $now = new \DateTime();
        $activeBookings = count(array_filter($reservations, function($reservation) use ($now) {
            return $reservation->getDateRes() > $now;
        }));

        // Get recent activities
        $recentActivities = [];
        foreach ($reservations as $reservation) {
            $recentActivities[] = [
                'title' => 'Réservation pour ' . $reservation->getOffre()->getPlace(),
                'date' => $reservation->getDateRes(),
                'icon' => 'ticket-alt'
            ];
        }

        return $this->render('dashVoyageurs/dashboardPageVoyageurs.html.twig', [
            'total_trips' => $totalTrips,
            'loyalty_points' => $user->getDiamond(),
            'active_bookings' => $activeBookings,
            'recent_activities' => $recentActivities,
            'user' => $user
        ]);
    }

    #[Route('/voyageurs/statistiques', name: 'app_voyageurs_statistiques')]
    public function statistiques( ReservationTransportRepository $reservationRepository, StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository ): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }

        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);

        $reservations = $reservationRepository->findByUserId($userId);

        $totalReservations = count($reservations);
        $now = new \DateTime();
        
        $activeReservations = count(array_filter($reservations, function($reservation) use ($now) {
            return $reservation->getDateRes() <= $now && $reservation->getDateFin() >= $now;
        }));

        // Réservations terminées
        $finishedReservations = count(array_filter($reservations, function($reservation) use ($now) {
            return $reservation->getDateFin() < $now;
        }));

        $upcomingReservations = count(array_filter($reservations, function($reservation) use ($now) {
            return $reservation->getDateRes() > $now;
        }));

        $totalSpent = array_reduce($reservations, function($carry, $reservation) {
            return $carry + $reservation->getPrix();
        }, 0);

        // Trouver les stations les plus fréquentées
        $stationCounts = [];
        foreach ($reservations as $reservation) {
            $stationId = $reservation->getStation()->getIdS();
            if (!isset($stationCounts[$stationId])) {
                $stationCounts[$stationId] = [
                    'count' => 0,
                    'station' => $reservation->getStation()
                ];
            }
            $stationCounts[$stationId]['count']++;
        }

        // Trier les stations par nombre de réservations
        uasort($stationCounts, function($a, $b) {
            return $b['count'] - $a['count'];
        });

        // Prendre les 5 stations les plus fréquentées
        $topStations = array_slice($stationCounts, 0, 5, true);

        // Calculer les statistiques mensuelles
        $monthlyStats = [];
        $currentYear = (int)$now->format('Y');
        
        for ($month = 1; $month <= 12; $month++) {
            $monthStart = new \DateTime("$currentYear-$month-01");
            $monthEnd = (clone $monthStart)->modify('last day of this month');
            
            $monthlyReservations = array_filter($reservations, function($reservation) use ($monthStart, $monthEnd) {
                return $reservation->getDateRes() >= $monthStart && $reservation->getDateRes() <= $monthEnd;
            });
            
            $monthlyStats[$month] = [
                'count' => count($monthlyReservations),
                'total' => array_reduce($monthlyReservations, function($carry, $reservation) {
                    return $carry + $reservation->getPrix();
                }, 0)
            ];
        }

        return $this->render('dashVoyageurs/statistiques.html.twig', [
            'user' => $user,
            'totalReservations' => $totalReservations,
            'activeReservations' => $activeReservations,
            'finishedReservations' => $finishedReservations,
            'upcomingReservations' => $upcomingReservations,
            'totalSpent' => $totalSpent,
            'topStations' => $topStations,
            'monthlyStats' => $monthlyStats
        ]);
    }

    #[Route('/voyageurs/ai-assistant', name: 'ai_assistant_page')]
    public function aiAssistantPage(): Response
    {
        return $this->render('dashVoyageurs/aiAssistant.html.twig');
    }

    #[Route('/voyageurs/api-test', name: 'api_test_page')]
    public function apiTestPage(): Response
    {
        return $this->render('dashVoyageurs/api-test.html.twig');
    }

    #[Route('/api/assistant/suggestions', name: 'api_assistant_suggestions', methods: ['POST'])]
    public function getAiSuggestions(Request $request, BonPlanRepository $bonPlanRepository, LoggerInterface $logger = null): JsonResponse
    {
        try {
            // Activer CORS
            $response = new JsonResponse();
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'POST');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            
            // Log des informations de requête
            if ($logger) {
                $logger->info('API Assistant: Requête reçue', [
                    'content_type' => $request->headers->get('Content-Type'),
                    'client_ip' => $request->getClientIp(),
                    'method' => $request->getMethod()
                ]);
            }
            
            // Vérifier le Content-Type
            if (!$request->headers->has('Content-Type') || $request->headers->get('Content-Type') !== 'application/json') {
                if ($logger) {
                    $logger->warning('API Assistant: Content-Type invalide', [
                        'received' => $request->headers->get('Content-Type') 
                    ]);
                }
                return $response->setData([
                    'error' => 'Content-Type doit être application/json',
                    'received' => $request->headers->get('Content-Type')
                ]);
            }
            
            // Récupérer et parser le contenu
            $content = $request->getContent();
            if (empty($content)) {
                if ($logger) {
                    $logger->warning('API Assistant: Corps de requête vide');
                }
                return $response->setData([
                    'error' => 'Le corps de la requête est vide'
                ]);
            }
            
            $data = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                if ($logger) {
                    $logger->error('API Assistant: Erreur de décodage JSON', [
                        'error' => json_last_error_msg()
                    ]);
                }
                return $response->setData([
                    'error' => 'JSON invalide: ' . json_last_error_msg()
                ]);
            }
            
            $location = $data['location'] ?? '';
            $preferences = $data['preferences'] ?? [];
            
            if ($logger) {
                $logger->info('API Assistant: Paramètres', [
                    'location' => $location,
                    'preferences' => $preferences
                ]);
            }
            
            if (empty($location)) {
                return $response->setData([
                    'error' => 'La localisation est requise'
                ]);
            }
            
            // Rechercher les bons plans correspondants
            try {
                $bonplans = $bonPlanRepository->findByLocationAndPreferences($location);
                
                if ($logger) {
                    $logger->info('API Assistant: Résultats', [
                        'count' => count($bonplans)
                    ]);
                }
            } catch (\Exception $e) {
                if ($logger) {
                    $logger->error('API Assistant: Erreur lors de la recherche', [
                        'error' => $e->getMessage()
                    ]);
                }
                return $response->setData([
                    'error' => 'Erreur de base de données: ' . $e->getMessage()
                ]);
            }

            // Formater les suggestions
            $suggestions = [];
            foreach ($bonplans as $bonplan) {
                $suggestions[] = [
                    'name' => $bonplan->getNomplace(),
                    'type' => $bonplan->getTypePlace(),
                    'location' => $bonplan->getLocalisation(),
                    'description' => $bonplan->getDescription()
                ];
            }

            // Si aucun bon plan n'est trouvé
            if (empty($suggestions)) {
                $noResultsMsg = "Je n'ai pas trouvé de bons plans correspondant à vos critères dans $location. " .
                               "Voici quelques suggestions générales pour cette zone...";
                
                if ($logger) {
                    $logger->info('API Assistant: Aucun résultat');
                }
                
                return $response->setData([
                    'suggestions' => $noResultsMsg
                ]);
            }

            // Formater la réponse
            $responseText = "Voici les bons plans que j'ai trouvés à $location :\n\n";
            foreach ($suggestions as $suggestion) {
                $responseText .= "🏠 {$suggestion['name']}\n";
                $responseText .= "📍 {$suggestion['location']}\n";
                $responseText .= "🏷️ {$suggestion['type']}\n";
                $responseText .= "ℹ️ {$suggestion['description']}\n\n";
            }

            return $response->setData([
                'suggestions' => $responseText
            ]);
            
        } catch (\Exception $e) {
            if ($logger) {
                $logger->error('API Assistant: Exception non gérée', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
            }
            
            return new JsonResponse([
                'error' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/assistant/suggestions', name: 'api_assistant_suggestions_preflight', methods: ['OPTIONS'])]
    public function handleCorsPreflightRequest(): Response
    {
        $response = new Response();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}

?>