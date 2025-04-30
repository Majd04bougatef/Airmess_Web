<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\AdminUserType;
use App\Entity\BonPlan;
use App\Repository\UserRepository;
use App\Repository\StationRepository;
use App\Repository\BonPlanRepository;
use App\Repository\ReservationTransportRepository;
use App\Repository\PageViewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreRepository;
use App\Repository\ExpenseRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Knp\Snappy\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Service\EmailService;
use App\Service\TwilioService;


class AdminController extends AbstractController
{
    #[Route('/dashboardPage', name: 'dashboard_page')]
    public function dashboardPage(
        UserRepository $userRepository,
        StationRepository $stationRepository,
        ReservationTransportRepository $reservationRepository,
        OffreRepository $offreRepository,
        PageViewRepository $pageViewRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        // Get counts for dashboard stats
        $userCount = $userRepository->count(['deleteFlag' => 0]);
        $stationCount = $stationRepository->count([]);
        $reservationCount = $reservationRepository->count([]);
        $offerCount = $offreRepository->count([]);

        // Get page view statistics
        $totalPageViews = $pageViewRepository->getTotalPageViews();
        $todayPageViews = $pageViewRepository->getTodayPageViews();
        $currentMonthPageViews = $pageViewRepository->getCurrentMonthPageViews();
        
        // Get page views by day for chart
        $pageViewsByDay = $pageViewRepository->getPageViewsByDay(7);
        $viewLabels = [];
        $viewData = [];
        
        foreach ($pageViewsByDay as $dayView) {
            $viewLabels[] = (new \DateTime($dayView['date']))->format('d/m');
            $viewData[] = $dayView['count'];
        }
        
        // Get most viewed pages
        $mostViewedPages = $pageViewRepository->getMostViewedPages(5);

        // User role distribution for charts
        $usersByRole = $this->getUserCountByRole($userRepository);
        
        // Get user activity stats
        $onlineUsersCount = count($userRepository->findCurrentlyOnlineUsers());
        $activeLastMonthCount = count($userRepository->findUsersActiveInLastMonth());
        $activeTodayCount = count($userRepository->findUsersActiveToday());
        $activeThisMonthCount = count($userRepository->findUsersActiveThisMonth());
        
        // Calculate activity rates
        $activityRateToday = $userCount > 0 ? round(($activeTodayCount / $userCount) * 100) : 0;
        $activityRateMonth = $userCount > 0 ? round(($activeThisMonthCount / $userCount) * 100) : 0;
        
        return $this->render('dashAdmin/dashboardPage.html.twig', [
            'userCount' => $userCount,
            'stationCount' => $stationCount,
            'reservationCount' => $reservationCount,
            'offerCount' => $offerCount,
            'usersByRole' => $usersByRole,
            'onlineUsersCount' => $onlineUsersCount,
            'activeLastMonthCount' => $activeLastMonthCount,
            'activeTodayCount' => $activeTodayCount,
            'activeThisMonthCount' => $activeThisMonthCount,
            'activityRateToday' => $activityRateToday,
            'activityRateMonth' => $activityRateMonth,
            'totalPageViews' => $totalPageViews,
            'todayPageViews' => $todayPageViews,
            'currentMonthPageViews' => $currentMonthPageViews,
            'viewLabels' => json_encode($viewLabels),
            'viewData' => json_encode($viewData),
            'mostViewedPages' => $mostViewedPages,
        ]);
    }

    #[Route('/UserPage/{page}', name: 'user_page', requirements: ['page' => '\d+'], defaults: ['page' => 1])]
    public function UserPage(
        Request $request, 
        UserRepository $userRepository, 
        EntityManagerInterface $entityManager,
        int $page = 1
    ): Response
    {
        $pageSize = 10; // Number of users per page
        
        // Detect AJAX requests
        $isAjax = $request->isXmlHttpRequest();
        
        // Process JSON data if it's an AJAX POST request
        if ($isAjax && $request->isMethod('POST')) {
            $data = json_decode($request->getContent(), true);
            $filters = [];
            
            if (!empty($data['role'])) {
                $filters['role'] = $data['role'];
            }
            
            if (!empty($data['status'])) {
                $filters['status'] = $data['status'];
            }
            
            if (!empty($data['search'])) {
                $filters['search'] = $data['search'];
            }
        } else {
            // Collect any filter parameters from query string for normal page loads
            $filters = [];
            if ($request->query->has('role')) {
                $filters['role'] = $request->query->get('role');
            }
            if ($request->query->has('status')) {
                $filters['status'] = $request->query->get('status');
            }
            if ($request->query->has('search')) {
                $filters['search'] = $request->query->get('search');
            }
        }
        
        // Get paginated results with any filters
        $results = $userRepository->findPaginatedUsers($page, $pageSize, $filters);
        
        // Check if user images exist, fix in database if not
        $updateDb = false;
        // Use the correct external path for images
        $userImagesDir = 'C:/xampp/htdocs/images_users/';
        
        foreach ($results['items'] as $user) {
            $imagePath = $userImagesDir . $user->getImagesU();
            
            // If user image doesn't exist or is empty, set to default
            if (empty($user->getImagesU()) || 
                $user->getImagesU() === 'default.jpg' || 
                !file_exists($imagePath)) {
                
                // Always use default.png for missing images
                $user->setImagesU('default.png');
                $updateDb = true;
            }
        }
        
        // Save changes if any
        if ($updateDb) {
            $entityManager->flush();
        }
        
        // User role distribution for charts
        $usersByRole = $this->getUserCountByRole($userRepository);
        
        // Get user activity statistics
        $onlineUsersCount = count($userRepository->findCurrentlyOnlineUsers());
        $activeTodayCount = count($userRepository->findUsersActiveToday());
        $activeMonthCount = count($userRepository->findUsersActiveThisMonth());
        
        // Recent user activities - this would typically come from a separate activity log
        $recentActivities = [
            [
                'type' => 'new_user',
                'description' => 'Nouvel utilisateur inscrit',
                'date' => new \DateTime('-2 hours'),
                'icon' => 'fas fa-user-plus text-success'
            ],
            [
                'type' => 'update',
                'description' => 'Profil utilisateur mis à jour',
                'date' => new \DateTime('-1 day'),
                'icon' => 'fas fa-user-edit text-primary'
            ],
            [
                'type' => 'delete',
                'description' => 'Compte utilisateur supprimé',
                'date' => new \DateTime('-3 days'),
                'icon' => 'fas fa-trash text-danger'
            ],
            [
                'type' => 'role_change',
                'description' => 'Modification des rôles d\'utilisateur',
                'date' => new \DateTime('-1 week'),
                'icon' => 'fas fa-user-shield text-info'
            ]
        ];
        
        // If AJAX request, return only the necessary HTML and data
        if ($isAjax) {
            // Render only the table rows
            $html = $this->renderView('dashAdmin/_user_table_rows.html.twig', [
                'users' => $results['items']
            ]);
            
            // Render the pagination
            $pagination = $this->renderView('dashAdmin/_pagination.html.twig', [
                'currentPage' => $results['currentPage'],
                'totalPages' => $results['totalPages'],
                'filters' => $filters
            ]);
            
            // Pagination info text
            $paginationInfo = sprintf(
                'Affichage des utilisateurs %d à %d sur %d utilisateurs',
                ($results['currentPage'] - 1) * $results['itemsPerPage'] + 1,
                min($results['currentPage'] * $results['itemsPerPage'], $results['totalItems']),
                $results['totalItems']
            );
            
            return new JsonResponse([
                'success' => true,
                'html' => $html,
                'pagination' => $pagination,
                'totalItems' => $results['totalItems'],
                'currentPage' => $results['currentPage'],
                'paginationInfo' => $paginationInfo
            ]);
        }
        
        // Normal page rendering
        return $this->render('dashAdmin/userPage.html.twig', [
            'users' => $results['items'],
            'usersByRole' => $usersByRole,
            'recentActivities' => $recentActivities,
            'currentPage' => $results['currentPage'],
            'totalPages' => $results['totalPages'],
            'pageSize' => $results['itemsPerPage'],
            'totalUsers' => $results['totalItems'],
            'filters' => $filters,
            // Add user activity statistics
            'onlineUsersCount' => $onlineUsersCount,
            'activeTodayCount' => $activeTodayCount,
            'activeMonthCount' => $activeMonthCount
        ]);
    }

    #[Route('/ExpensePage', name: 'expense_page')]
    public function ExpensePage(
        ExpenseRepository $expenseRepository, 
        UserRepository $userRepository, 
        SessionInterface $session
    ): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Error handling for missing user
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // If admin, show all expenses, otherwise only user's expenses
        $expenses = ($user && ($user->getRoleUser() === 'Admin' || $user->getRoleUser() === 'ROLE_ADMIN')) 
            ? $expenseRepository->findAll() 
            : $expenseRepository->findBy(['user' => $user]);
        
        return $this->render('expense/index.html.twig', [
            'expenses' => $expenses
        ]);
    }

    #[Route('/UserPage/add', name: 'admin_user_add', methods: ['POST'])]
    public function addUser(
        Request $request, 
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        if ($request->isXmlHttpRequest()) {
            try {
                // Get data from request
                $name = $request->request->get('name');
                $prenom = $request->request->get('prenom');
                $email = $request->request->get('email');
                $password = $request->request->get('password');
                $phone = $request->request->get('phone');
                $role = $request->request->get('role');
                
                // Create new user
                $user = new User();
                $user->setName($name);
                $user->setPrenom($prenom);
                $user->setEmail($email);
                
                // Hash password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $user->setPassword($hashedPassword);
                
                $user->setRoleUser($role);
                $user->setPhoneNumber($phone);
                // Ensure consistent status value (always use 'actif')
                $user->setStatut('actif');
                $user->setDiamond(0);
                $user->setDeleteFlag(0);
                
                // Default image if no upload
                $user->setImagesU('default.png');
                
                // Set current date as registration date
                $user->setDateNaiss(new \DateTime());
                
                // Handle photo upload if present
                $photoFile = $request->files->get('photo');
                if ($photoFile) {
                    $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                    // Generate a unique name for the file without using transliterator_transliterate
                    $safeFilename = preg_replace('/[^A-Za-z0-9_]/', '', $originalFilename);
                    $safeFilename = strtolower($safeFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                    
                    // Move the file to the directory where user photos are stored
                    try {
                        $photoFile->move(
                            'C:/xampp/htdocs/images_users',
                            $newFilename
                        );
                        // Update the 'imagesU' property to store the photo filename
                        $user->setImagesU($newFilename);
                    } catch (\Exception $e) {
                        return new JsonResponse([
                            'success' => false,
                            'message' => 'Erreur lors du téléchargement de l\'image: '.$e->getMessage()
                        ], 500);
                    }
                }
                
                // Save user
                $entityManager->persist($user);
                $entityManager->flush();
                
                return new JsonResponse(['success' => true, 'userId' => $user->getIdU()]);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'success' => false, 
                    'message' => 'Erreur lors de la création: '.$e->getMessage()
                ], 500);
            }
        }
        
        return new JsonResponse(['success' => false, 'message' => 'Invalid request'], 400);
    }

    #[Route('/UserPage/edit/{id_U}', name: 'admin_user_edit', methods: ['POST'])]
    public function editUser(
        Request $request, 
        User $user, 
        EntityManagerInterface $entityManager
    ): Response
    {
        try {
            // Get all parameters from request
            $name = $request->request->get('name');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $phone = $request->request->get('phone');
            $role = $request->request->get('role');
            $status = $request->request->get('status');
            
            // Debug request
            $allParams = $request->request->all();
            $debug = 'Request params: ' . json_encode($allParams);
            error_log($debug);
            
            // Validate required fields
            if (empty($name) || empty($prenom) || empty($email)) {
                $missingFields = [];
                if (empty($name)) $missingFields[] = 'name';
                if (empty($prenom)) $missingFields[] = 'prenom';
                if (empty($email)) $missingFields[] = 'email';
                
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Champs requis manquants: ' . implode(', ', $missingFields)
                ], 400);
            }
            
            // Update user fields
            $user->setName($name);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            
            if (!empty($phone)) {
                $user->setPhoneNumber($phone);
            }
            
            if (!empty($role)) {
                $user->setRoleUser($role);
            }
            
            if (!empty($status)) {
                // Normalize status
                $status = strtolower($status);
                if ($status == 'active') $status = 'actif';
                if ($status == 'inactive') $status = 'inactif';
                $user->setStatut($status);
            }
            
            // Handle photo upload if present
            $photoFile = $request->files->get('photo');
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = preg_replace('/[^A-Za-z0-9_]/', '', $originalFilename);
                $safeFilename = strtolower($safeFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                
                try {
                    $photoFile->move(
                        'C:/xampp/htdocs/images_users',
                        $newFilename
                    );
                    $user->setImagesU($newFilename);
                } catch (\Exception $e) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Erreur lors du téléchargement de l\'image: '.$e->getMessage()
                    ], 500);
                }
            }
            
            // Save changes
            $entityManager->flush();
            
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            error_log('Error in editUser: ' . $e->getMessage());
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors de la mise à jour: '.$e->getMessage()
            ], 500);
        }
    }

    #[Route('/UserPage/delete/{id_U}', name: 'admin_user_delete', methods: ['POST'])]
    public function deleteUser(
        User $user, 
        EntityManagerInterface $entityManager,
        TwilioService $twilioService
    ): Response
    {
        try {
            // Mark user as inactive and set delete flag
            $user->setStatut('inactif');
            $user->setDeleteFlag(1);
            
            // Save changes to database
            $entityManager->flush();
            
            // Send SMS notification if the user has a phone number
            $smsStatus = 'non envoyé';
            if ($user->getPhoneNumber()) {
                $phoneNumber = $user->getPhoneNumber();
                
                // Remove any spaces, dashes, or other non-numeric characters
                $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);
                
                // Format for Tunisian phone numbers (Ooredoo, Orange, Telecom)
                // Tunisian numbers are 8 digits, and country code is +216
                
                // If the number starts with 0, remove it (common phone number entry format)
                if (str_starts_with($phoneNumber, '0')) {
                    $phoneNumber = substr($phoneNumber, 1);
                }
                
                // If number already has country code (starts with 216), add + sign
                if (str_starts_with($phoneNumber, '216')) {
                    $phoneNumber = '+' . $phoneNumber;
                }
                // If number is just the 8 digits without country code, add +216
                else if (strlen($phoneNumber) == 8) {
                    $phoneNumber = '+216' . $phoneNumber;
                }
                // Any other format, just add + to ensure E.164 format
                else if (!str_starts_with($phoneNumber, '+')) {
                    $phoneNumber = '+' . $phoneNumber;
                }
                
                // Log the phone number format
                error_log('Sending SMS to number: ' . $phoneNumber);
                
                $message = "Cher(e) " . $user->getPrenom() . ", votre compte Airmess a été désactivé par un administrateur. Veuillez contacter le support pour plus d'informations.";
                $result = $twilioService->sendSms($phoneNumber, $message);
                
                if ($result['success']) {
                    $smsStatus = 'envoyé';
                } else {
                    $smsStatus = 'échec: ' . ($result['error'] ?? 'erreur inconnue');
                }
            }
            
            // Send notification to admin monitoring number
            $adminNumber = '+21620981776';
            $adminMessage = "AIRMESS ADMIN NOTIFICATION: Un compte utilisateur a été désactivé - " . 
                            $user->getPrenom() . " " . $user->getName() . 
                            " (ID: " . $user->getIdU() . ", Email: " . $user->getEmail() . ")";
            
            $adminSmsResult = $twilioService->sendSms($adminNumber, $adminMessage);
            $adminSmsStatus = $adminSmsResult['success'] ? 'envoyé' : 'échec';
            
            error_log("Admin notification SMS: " . $adminSmsStatus);
            
            return new JsonResponse([
                'success' => true,
                'message' => 'L\'utilisateur a été désactivé avec succès. SMS ' . $smsStatus,
                'userName' => $user->getPrenom() . ' ' . $user->getName(),
                'smsStatus' => $smsStatus,
                'adminSmsStatus' => $adminSmsStatus
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors de la désactivation: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/UserPage/activate-all', name: 'admin_activate_all_users', methods: ['POST'])]
    public function activateAllUsers(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        try {
            // Get all users (excluding deleted ones)
            $users = $userRepository->findBy(['deleteFlag' => 0]);
            
            $updatedCount = 0;
            foreach ($users as $user) {
                if ($user->getStatut() !== 'actif') {
                    $user->setStatut('actif');
                    $updatedCount++;
                }
            }
            
            // Save all changes
            $entityManager->flush();
            
            return new JsonResponse([
                'success' => true, 
                'message' => $updatedCount . ' utilisateurs ont été activés'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors de l\'activation des utilisateurs: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/StationPage/{page}', name: 'station_page', requirements: ['page' => '\d+'], defaults: ['page' => 1])]
    public function stationPage(StationRepository $stationRepository, int $page = 1): Response
    {
        // Get inactive stations with pagination
        $itemsPerPage = 10;
        $inactiveStations = $stationRepository->findBy(['statut' => 'inactive']);
        
        // Calculate total pages
        $totalStations = count($inactiveStations);
        $totalPages = ceil($totalStations / $itemsPerPage);
        
        // Get stations for current page
        $offset = ($page - 1) * $itemsPerPage;
        $stations = array_slice($inactiveStations, $offset, $itemsPerPage);
        
        return $this->render('dashAdmin/stationPage.html.twig', [
            'stations' => $stations,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    #[Route('/BonplanPage', name: 'bonplan_page')]
    public function bonplanPage(Request $request, BonPlanRepository $bonPlanRepository): Response
    {
        $searchTerm = $request->query->get('search', '');
        $type = $request->query->get('type');
        $sort = $request->query->get('sort', 'recent');
        
        // Construire la requête en fonction des filtres
        $queryBuilder = $bonPlanRepository->createQueryBuilder('b');
        
        // Appliquer les filtres
        if (!empty($searchTerm)) {
            $queryBuilder->andWhere('b.nomplace LIKE :search OR b.description LIKE :search OR b.localisation LIKE :search')
                        ->setParameter('search', '%' . $searchTerm . '%');
        }
        
        if ($type) {
            $queryBuilder->andWhere('b.typePlace = :type')
                        ->setParameter('type', $type);
        }
        
        // Appliquer le tri
        switch ($sort) {
            case 'name_asc':
                $queryBuilder->orderBy('b.nomplace', 'ASC');
                break;
            case 'name_desc':
                $queryBuilder->orderBy('b.nomplace', 'DESC');
                break;
            case 'recent':
            default:
                $queryBuilder->orderBy('b.idP', 'DESC');
                break;
        }
        
        // Exécuter la requête
        $bonPlans = $queryBuilder->getQuery()->getResult();
        
        // Récupérer les statistiques
        $statsByType = $bonPlanRepository->getStatsByType();
        $generalStats = $bonPlanRepository->getGeneralStats();
        
        // Passer les bon plans et le terme de recherche à la vue
        return $this->render('dashAdmin/bonplanPage.html.twig', [
            'bonPlans' => $bonPlans,
            'searchTerm' => $searchTerm,
            'type' => $type,
            'sort' => $sort,
            'statsByType' => $statsByType,
            'generalStats' => $generalStats
        ]);
    }


    #[Route('/admin/offres', name: 'app_offre_page', methods: ['GET'])]
    public function offrePage(OffreRepository $offreRepository): Response
    {
        // Récupérer toutes les offres depuis le repository
        $offres = $offreRepository->findAll();

        // Transmettre les offres au template
        return $this->render('dashAdmin/offrePage.html.twig', [
            'offres' => $offres,
        ]);
    }

    #[Route('/SocialPage', name: 'social_page')]
    public function socialPage(): Response
    {
        // Redirection vers le nouveau contrôleur de gestion des médias sociaux
        return $this->redirectToRoute('admin_social_media_index');
    }
    
    /**
     * Get user count by role for charts
     */
    private function getUserCountByRole(UserRepository $userRepository): array
    {
        $users = $userRepository->findBy(['deleteFlag' => 0]);
        
        $roleCount = [
            'Voyageurs' => 0,
            'Entreprise' => 0,
            'Admin' => 0
        ];
        
        foreach ($users as $user) {
            $role = $user->getRoleUser();
            if (isset($roleCount[$role])) {
                $roleCount[$role]++;
            }
        }
        
        return $roleCount;
    }


    #[Route('/admin/bonplan/delete/{id}', name: 'admin_bonplan_delete', methods: ['POST'])]
    public function deleteBonPlan(
        BonPlan $bonPlan, 
        EntityManagerInterface $entityManager
    ): Response
    {
        try {
            // Supprimer le bon plan
            $entityManager->remove($bonPlan);
            $entityManager->flush();
            
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false, 
                'message' => 'Erreur lors de la suppression: '.$e->getMessage()
            ], 500);
        }
    }


    #[Route('/admin/stations', name: 'admin_stations')]
    public function stations(StationRepository $stationRepository): Response
    {
        $stations = $stationRepository->findStationsEnAttente();
        return $this->render('admin/stations.html.twig', [
            'stations' => $stations
        ]);
    }

    #[Route('/admin/stations/{id}/approuver', name: 'admin_station_approuver', methods: ['POST'])]
    public function approuverStation(int $id, StationRepository $stationRepository, Request $request): Response
    {
        try {
            // Check if it's an AJAX request
            if ($request->isXmlHttpRequest()) {
                // Validate CSRF token
                if (!$this->isCsrfTokenValid('approuver-station', $request->headers->get('X-CSRF-TOKEN'))) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Token CSRF invalide'
                    ], 400);
                }

                // Find the station
                $station = $stationRepository->find($id);
                if (!$station) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Station non trouvée'
                    ], 404);
                }

                // Update station status
                $station->setStatut('active');
                $stationRepository->save($station, true);

                return new JsonResponse([
                    'success' => true,
                    'message' => 'Station approuvée avec succès'
                ]);
            }

            // Handle non-AJAX request
            if ($this->isCsrfTokenValid('approuver-station', $request->request->get('_token'))) {
                $station = $stationRepository->find($id);
                if ($station) {
                    $station->setStatut('active');
                    $stationRepository->save($station, true);
                    $this->addFlash('success', 'Station approuvée avec succès');
                }
            }

            return $this->redirectToRoute('station_page');
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'approbation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show detailed list of online users
     */
    #[Route('/admin/online-users', name: 'admin_online_users_details')]
    public function onlineUsersDetails(UserRepository $userRepository): Response
    {
        // Get all currently online users
        $onlineUsers = $userRepository->findCurrentlyOnlineUsers();
        $userCount = $userRepository->count(['deleteFlag' => 0]);
        
        return $this->render('dashAdmin/onlineUsersDetails.html.twig', [
            'onlineUsers' => $onlineUsers,
            'userCount' => $userCount,
            'currentTime' => new \DateTime()
        ]);
    }

    /**
     * Show detailed list of users active in the last month
     */
    #[Route('/admin/monthly-active-users', name: 'admin_monthly_users_details')]
    public function monthlyActiveUsersDetails(UserRepository $userRepository): Response
    {
        // Get users active in different time periods
        $activeUsersToday = $userRepository->findUsersActiveToday();
        $activeUsersThisMonth = $userRepository->findUsersActiveThisMonth();
        $activeUsersThisYear = $userRepository->findUsersActiveThisYear();
        $userCount = $userRepository->count(['deleteFlag' => 0]);
        
        return $this->render('dashAdmin/monthlyActiveUsersDetails.html.twig', [
            'activeUsersToday' => $activeUsersToday,
            'activeUsersThisMonth' => $activeUsersThisMonth,
            'activeUsersThisYear' => $activeUsersThisYear,
            'userCount' => $userCount,
            'currentTime' => new \DateTime(),
            'startDateMonth' => new \DateTime('first day of this month midnight'),
            'startDateYear' => new \DateTime('first day of January this year midnight')
        ]);
    }

    /**
     * @Route("/admin/users/search", name="admin_users_search", methods={"POST"})
     */
    public function searchUsers(Request $request, UserRepository $userRepository): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => false, 'message' => 'Invalid request'], 400);
        }

        $data = json_decode($request->getContent(), true);
        $search = $data['search'] ?? '';
        $role = $data['role'] ?? '';
        $status = $data['status'] ?? '';
        $page = $data['page'] ?? 1;

        // Get paginated users with search filters
        $users = $userRepository->findPaginatedUsers($page, 10, $search, $role, $status);
        
        // Render the table rows
        $html = $this->renderView('dashAdmin/_user_table_rows.html.twig', [
            'users' => $users['items']
        ]);

        // Render the pagination
        $pagination = $this->renderView('dashAdmin/_pagination.html.twig', [
            'currentPage' => $page,
            'totalPages' => $users['totalPages']
        ]);

        return new JsonResponse([
            'success' => true,
            'html' => $html,
            'pagination' => $pagination,
            'totalItems' => $users['totalItems']
        ]);
    }

 
    #[Route('/admin/online-users/search', name: 'admin_online_users_search', methods: ['POST'])]
    public function searchOnlineUsers(Request $request, UserRepository $userRepository): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(['success' => false, 'message' => 'Invalid request'], 400);
        }

        // Get search parameters
        $search = $request->request->get('search', '');
        $role = $request->request->get('role', '');
        
        // Get all online users
        $onlineUsers = $userRepository->findCurrentlyOnlineUsers();
        
        // Filter by search term if provided
        if (!empty($search)) {
            $onlineUsers = array_filter($onlineUsers, function($user) use ($search) {
                $searchLower = strtolower($search);
                return (
                    str_contains(strtolower($user->getName() ?? ''), $searchLower) ||
                    str_contains(strtolower($user->getPrenom() ?? ''), $searchLower) ||
                    str_contains(strtolower($user->getEmail() ?? ''), $searchLower)
                );
            });
        }
        
        // Filter by role if provided
        if (!empty($role)) {
            $onlineUsers = array_filter($onlineUsers, function($user) use ($role) {
                return $user->getRoleUser() === $role;
            });
        }
        
        // Render the table rows
        $html = $this->renderView('dashAdmin/_online_users_table_rows.html.twig', [
            'onlineUsers' => $onlineUsers
        ]);

        return new JsonResponse([
            'success' => true,
            'html' => $html,
            'count' => count($onlineUsers)
        ]);
    }

    /**
     * Export users list to PDF
     */
    #[Route('/admin/users/export/pdf', name: 'admin_users_export_pdf', methods: ['POST'])]
    public function exportUsersToPdf(Request $request, UserRepository $userRepository): Response
    {
        // Get filter parameters
        $filters = [
            'role' => $request->request->get('role', ''),
            'status' => $request->request->get('status', ''),
            'search' => $request->request->get('search', ''),
        ];
        
        // Get customization options
        $title = $request->request->get('title', 'Liste des Utilisateurs');
        $orientation = $request->request->get('orientation', 'landscape');
        $showTimestamp = $request->request->get('showTimestamp') == '1';
        $showFilters = $request->request->get('showFilters') == '1';
        $theme = $request->request->get('theme', 'default');
        
        // Get column selections
        $columns = [
            'user' => $request->request->get('includeUserColumn') == '1',
            'role' => $request->request->get('includeRoleColumn') == '1',
            'status' => $request->request->get('includeStatusColumn') == '1',
            'date' => $request->request->get('includeDateColumn') == '1',
            'phone' => $request->request->get('includePhoneColumn') == '1',
        ];
        
        // Fetch all users (we'll paginate in the view if needed)
        $users = $userRepository->findFilteredUsers($filters);
        
        // Render the PDF template
        $html = $this->renderView('dashAdmin/exports/users_pdf.html.twig', [
            'users' => $users,
            'title' => $title,
            'timestamp' => new \DateTime(),
            'showTimestamp' => $showTimestamp,
            'filters' => $filters,
            'showFilters' => $showFilters,
            'columns' => $columns,
            'theme' => $theme
        ]);
        
        // Configure Dompdf
        $options = new \Dompdf\Options();
        $options->set('defaultFont', 'Arial');
        $options->setIsRemoteEnabled(true);
        
        // Create new PDF instance
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', $orientation);
        $dompdf->render();
        
        // Create response
        $filename = 'utilisateurs_' . (new \DateTime())->format('Y-m-d') . '.pdf';
        $response = new Response($dompdf->output());
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
        
        return $response;
    }
    
    /**
     * Export users list to Excel
     */
    #[Route('/admin/users/export/excel', name: 'admin_users_export_excel', methods: ['POST'])]
    public function exportUsersToExcel(Request $request, UserRepository $userRepository): Response
    {
        // Get filter parameters
        $filters = [
            'role' => $request->request->get('role', ''),
            'status' => $request->request->get('status', ''),
            'search' => $request->request->get('search', ''),
        ];
        
        // Fetch all users with filters
        $users = $userRepository->findFilteredUsers($filters);
        
        // Determine what columns to include
        $includeUser = $request->request->has('includeUserColumn', true);
        $includeRole = $request->request->has('includeRoleColumn', true);
        $includeStatus = $request->request->has('includeStatusColumn', true);
        $includeDate = $request->request->has('includeDateColumn', true);
        $includePhone = $request->request->has('includePhoneColumn', true);
        
        // Create CSV response
        $response = new StreamedResponse(function() use ($users, $includeUser, $includeRole, $includeStatus, $includeDate, $includePhone) {
            $handle = fopen('php://output', 'w+');
            
            // Add UTF-8 BOM to fix Excel encoding
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Write headers
            $headers = [];
            if ($includeUser) $headers[] = 'Utilisateur';
            if ($includeUser) $headers[] = 'Email';
            if ($includeRole) $headers[] = 'Rôle';
            if ($includeStatus) $headers[] = 'Statut';
            if ($includeDate) $headers[] = "Date de naissance";
            if ($includePhone) $headers[] = 'Téléphone';
            
            fputcsv($handle, $headers, ';');
            
            // Write data rows
            foreach ($users as $user) {
                $row = [];
                
                if ($includeUser) {
                    $row[] = $user->getName() . ' ' . $user->getPrenom();
                    $row[] = $user->getEmail();
                }
                
                if ($includeRole) {
                    $row[] = $user->getRoleUser();
                }
                
                if ($includeStatus) {
                    $row[] = $user->getStatut();
                }
                
                if ($includeDate) {
                    $dateValue = $user->getDateNaiss() instanceof \DateTime 
                        ? $user->getDateNaiss()->format('d/m/Y') 
                        : '';
                    $row[] = $dateValue;
                }
                
                if ($includePhone) {
                    $row[] = $user->getPhoneNumber();
                }
                
                fputcsv($handle, $row, ';');
            }
            
            fclose($handle);
        });
        
        $filename = 'utilisateurs_' . (new \DateTime())->format('Y-m-d') . '.csv';
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
        
        return $response;
    }

    #[Route('/admin/pageviews', name: 'admin_page_views')]
    public function pageViews(
        PageViewRepository $pageViewRepository
    ): Response
    {
        // Get total page views
        $totalPageViews = $pageViewRepository->getTotalPageViews();
        
        // Get today's page views
        $todayPageViews = $pageViewRepository->getTodayPageViews();
        
        // Get current month's page views
        $currentMonthPageViews = $pageViewRepository->getCurrentMonthPageViews();
        
        // Get page views by day for the past 30 days (for chart)
        $pageViewsByDay = $pageViewRepository->getPageViewsByDay(30);
        
        // Format data for chart
        $labels = [];
        $data = [];
        
        foreach ($pageViewsByDay as $dayView) {
            $labels[] = (new \DateTime($dayView['date']))->format('d/m');
            $data[] = $dayView['count'];
        }
        
        // Get most viewed pages
        $mostViewedPages = $pageViewRepository->getMostViewedPages(10);
        
        return $this->render('dashAdmin/pageViews.html.twig', [
            'totalPageViews' => $totalPageViews,
            'todayPageViews' => $todayPageViews,
            'currentMonthPageViews' => $currentMonthPageViews,
            'chartLabels' => json_encode($labels),
            'chartData' => json_encode($data),
            'mostViewedPages' => $mostViewedPages
        ]);
    }

    /**
     * Handle AJAX filtering for users table
     */
    #[Route('/admin/users/filter', name: 'admin_users_filter', methods: ['POST'])]
    public function filterUsers(
        Request $request, 
        UserRepository $userRepository
    ): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            error_log('Request is not AJAX: ' . $request->headers->get('X-Requested-With'));
            return new JsonResponse(['success' => false, 'message' => 'AJAX request required'], 400);
        }
        
        try {
            // Parse JSON from request
            $content = $request->getContent();
            error_log('Received filter request: ' . $content);
            
            $data = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log('JSON decode error: ' . json_last_error_msg());
                return new JsonResponse(['success' => false, 'message' => 'Invalid JSON: ' . json_last_error_msg()], 400);
            }
            
            // Get page number
            $page = isset($data['page']) ? (int)$data['page'] : 1;
            
            // Get filters
            $filters = isset($data['filters']) ? $data['filters'] : [];
            error_log('Applying filters: ' . json_encode($filters) . ' on page ' . $page);
            
            // Get paginated results with filters
            $results = $userRepository->findPaginatedUsers($page, 10, $filters);
            error_log('Found ' . $results['totalItems'] . ' users matching filters');
            
            // Render the table rows
            $html = $this->renderView('dashAdmin/_user_table_rows.html.twig', [
                'users' => $results['items']
            ]);
            
            // Render the pagination
            $pagination = $this->renderView('dashAdmin/_pagination.html.twig', [
                'currentPage' => $results['currentPage'],
                'totalPages' => $results['totalPages'],
                'filterParams' => $filters
            ]);
            
            // Pagination info text
            $paginationInfo = sprintf(
                'Affichage de <span class="fw-bold">%d</span> sur <span class="fw-bold">%d</span> utilisateur(s)',
                count($results['items']),
                $results['totalItems']
            );
            
            return new JsonResponse([
                'success' => true,
                'html' => $html,
                'pagination' => $pagination,
                'totalItems' => $results['totalItems'],
                'currentPage' => $results['currentPage'],
                'paginationInfo' => $paginationInfo,
                'itemsPerPage' => $results['itemsPerPage']
            ]);
        } catch (\Exception $e) {
            error_log('Error in filterUsers: ' . $e->getMessage());
            return new JsonResponse([
                'success' => false, 
                'message' => 'Error processing request: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/UserPage/activate/{id_U}', name: 'admin_user_activate', methods: ['POST'])]
    public function activateUser(
        User $user, 
        EntityManagerInterface $entityManager,
        EmailService $emailService
    ): Response
    {
        try {
            // Set status to active
            $user->setStatut('actif');
            
            // Save changes to database
            $entityManager->flush();
            
            // Try to send reactivation email to the user
            $emailSent = false;
            try {
                $emailSent = $emailService->sendReactivationEmail($user);
            } catch (\Exception $e) {
                // Log the email error but don't interrupt the activation process
                error_log('Error sending reactivation email: ' . $e->getMessage());
            }
            
            return new JsonResponse([
                'success' => true,
                'message' => 'L\'utilisateur a été réactivé avec succès' . ($emailSent ? ' et un email de notification a été envoyé' : ' mais l\'email n\'a pas pu être envoyé'),
                'userName' => $user->getPrenom() . ' ' . $user->getName(),
                'emailSent' => $emailSent
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors de la réactivation: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/VuesPage', name: 'vues_page')]
    public function vuesPage(
        PageViewRepository $pageViewRepository
    ): Response
    {
        // Get total page views
        $totalPageViews = $pageViewRepository->getTotalPageViews();
        
        // Get today's page views
        $todayPageViews = $pageViewRepository->getTodayPageViews();
        
        // Get current month's page views
        $currentMonthPageViews = $pageViewRepository->getCurrentMonthPageViews();
        
        // Get page views by day for the past 30 days (for chart)
        $pageViewsByDay = $pageViewRepository->getPageViewsByDay(30);
        
        // Format data for chart
        $labels = [];
        $data = [];
        
        foreach ($pageViewsByDay as $dayView) {
            $labels[] = (new \DateTime($dayView['date']))->format('d/m');
            $data[] = $dayView['count'];
        }
        
        // Get most viewed pages
        $mostViewedPages = $pageViewRepository->getMostViewedPages(10);
        
        return $this->render('dashAdmin/pageViews.html.twig', [
            'totalPageViews' => $totalPageViews,
            'todayPageViews' => $todayPageViews,
            'currentMonthPageViews' => $currentMonthPageViews,
            'chartLabels' => json_encode($labels),
            'chartData' => json_encode($data),
            'mostViewedPages' => $mostViewedPages
        ]);
    }

    #[Route('/admin/stations/{id}/details', name: 'admin_station_details', methods: ['GET'])]
    public function stationDetails(int $id, StationRepository $stationRepository): Response
    {
        $station = $stationRepository->find($id);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }
        
        return $this->render('dashAdmin/stationDetails.html.twig', [
            'station' => $station
        ]);
    }

    #[Route('/admin/stations/{id}/signaler-probleme', name: 'admin_station_signaler', methods: ['POST'])]
    public function signalerProblemeStation(
        int $id, 
        Request $request, 
        StationRepository $stationRepository, 
        EmailService $emailService
    ): Response
    {
        // Récupérer la station
        $station = $stationRepository->find($id);
        
        if (!$station) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Station non trouvée'
                ], 404);
            }
            throw $this->createNotFoundException('Station non trouvée');
        }
        
        // Récupérer la description du problème
        $description = $request->request->get('description');
        
        if (empty($description)) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'La description du problème est requise'
                ], 400);
            }
            $this->addFlash('error', 'La description du problème est requise');
            return $this->redirectToRoute('station_page');
        }
        
        // Récupérer l'utilisateur (entreprise) associé à la station
        $entreprise = $station->getUser();
        
        if (!$entreprise) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Aucune entreprise associée à cette station'
                ], 400);
            }
            $this->addFlash('error', 'Aucune entreprise associée à cette station');
            return $this->redirectToRoute('station_page');
        }
        
        // Préparer et envoyer l'email
        try {
            $success = $this->sendProblemEmail($entreprise->getEmail(), $station, $description, $emailService);
            
            if ($success) {
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse([
                        'success' => true,
                        'message' => 'Problème signalé avec succès à l\'entreprise'
                    ]);
                }
                $this->addFlash('success', 'Problème signalé avec succès à l\'entreprise');
            } else {
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Erreur lors de l\'envoi de l\'email'
                    ], 500);
                }
                $this->addFlash('error', 'Erreur lors de l\'envoi de l\'email');
            }
        } catch (\Exception $e) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage()
                ], 500);
            }
            $this->addFlash('error', 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
        }
        
        return $this->redirectToRoute('station_page');
    }
    
    private function sendProblemEmail(
        string $destinationEmail, 
        \App\Entity\Station $station, 
        string $description, 
        EmailService $emailService
    ): bool
    {
        $sujet = 'Problème signalé pour la station: ' . $station->getNom();
        $content = $this->renderView('emails/station_problem.html.twig', [
            'station' => $station,
            'description' => $description,
            'date' => new \DateTime()
        ]);
        
        return $emailService->sendCustomEmail($destinationEmail, $sujet, $content);
    }

    #[Route('/admin/reservations', name: 'admin_reservations')]
    public function reservations(ReservationTransportRepository $reservationRepository): Response
    {
        // Get basic statistics
        $totalReservations = $reservationRepository->count([]);
        $activeReservations = $reservationRepository->count(['statut' => 'active']);
        $totalRevenue = $reservationRepository->getTotalRevenue();
        $occupancyRate = $reservationRepository->getOccupancyRate();

        // Get monthly statistics for chart
        $monthlyStats = $reservationRepository->getMonthlyStats();
        $monthLabels = array_column($monthlyStats, 'month');
        $monthlyReservations = array_column($monthlyStats, 'count');

        // Get top stations
        $topStations = $reservationRepository->getTopStations();
        $topStationNames = array_column($topStations, 'station_name');
        $topStationReservations = array_column($topStations, 'reservation_count');

        // Get recent reservations
        $reservations = $reservationRepository->findBy(
            [],
            ['dateRes' => 'DESC'],
            10
        );

        return $this->render('dashAdmin/reservationsDashboard.html.twig', [
            'totalReservations' => $totalReservations,
            'activeReservations' => $activeReservations,
            'totalRevenue' => $totalRevenue,
            'occupancyRate' => $occupancyRate,
            'monthLabels' => $monthLabels,
            'monthlyReservations' => $monthlyReservations,
            'topStationNames' => $topStationNames,
            'topStationReservations' => $topStationReservations,
            'reservations' => $reservations
        ]);
    }

    #[Route('/admin/stations-dashboard', name: 'admin_stations_dashboard')]
    public function stationsDashboard(StationRepository $stationRepository): Response
    {
        // Get statistics
        $totalStations = $stationRepository->count([]);
        $activeStations = $stationRepository->count(['statut' => 'active']);
        $totalBikes = $stationRepository->getTotalBikes();
        $availableBikes = $stationRepository->getAvailableBikes();

        // Get stations by status
        $stationsByStatus = [
            'active' => $stationRepository->count(['statut' => 'active']),
            'inactive' => $stationRepository->count(['statut' => 'inactive'])
        ];

        // Get stations with low bike availability
        $lowAvailabilityStations = $stationRepository->findLowAvailabilityStations();

        // Get most popular stations
        $popularStations = $stationRepository->findMostPopularStations();

        return $this->render('dashAdmin/stationsDashboard.html.twig', [
            'totalStations' => $totalStations,
            'activeStations' => $activeStations,
            'totalBikes' => $totalBikes,
            'availableBikes' => $availableBikes,
            'stationsByStatus' => $stationsByStatus,
            'lowAvailabilityStations' => $lowAvailabilityStations,
            'popularStations' => $popularStations
        ]);
    }

    #[Route('/admin/reservations/{id}/details', name: 'admin_reservation_details')]
    public function reservationDetails(int $id, ReservationTransportRepository $reservationRepository): Response
    {
        $reservation = $reservationRepository->find($id);
        
        if (!$reservation) {
            throw $this->createNotFoundException('Réservation non trouvée');
        }
        
        return $this->render('dashAdmin/reservationDetails.html.twig', [
            'reservation' => $reservation
        ]);
    }
}

?>