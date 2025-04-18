<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\AdminUserType;
use App\Repository\UserRepository;
use App\Repository\StationRepository;
use App\Repository\ReservationTransportRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ExpenseRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AdminController extends AbstractController
{
    #[Route('/dashboardPage', name: 'dashboard_page')]
    public function dashboardPage(
        UserRepository $userRepository,
        StationRepository $stationRepository,
        ReservationTransportRepository $reservationRepository
    ): Response
    {
        // Get counts for dashboard stats
        $userCount = $userRepository->count([]);
        $stationCount = $stationRepository->count([]);
        $reservationCount = $reservationRepository->count([]);
        $offerCount = 0; // Replace with actual repository count when available

        // User role distribution for charts
        $usersByRole = $this->getUserCountByRole($userRepository);
        
        return $this->render('dashAdmin/dashboardPage.html.twig', [
            'userCount' => $userCount,
            'stationCount' => $stationCount,
            'reservationCount' => $reservationCount,
            'offerCount' => $offerCount,
            'usersByRole' => $usersByRole
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
        
        // Collect any filter parameters
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
        
        return $this->render('dashAdmin/userPage.html.twig', [
            'users' => $results['items'],
            'usersByRole' => $usersByRole,
            'recentActivities' => $recentActivities,
            'currentPage' => $results['currentPage'],
            'totalPages' => $results['totalPages'],
            'pageSize' => $results['itemsPerPage'],
            'totalUsers' => $results['totalItems'],
            'filters' => $filters
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
        EntityManagerInterface $entityManager
    ): Response
    {
        // Instead of deleting, set status to inactive
        $user->setStatut('inactif');
        $entityManager->flush();
        
        return new JsonResponse(['success' => true]);
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

    #[Route('/StationPage', name: 'station_page')]
    public function stationPage(StationRepository $stationRepository): Response
    {
        // Get inactive stations
        $inactiveStations = $stationRepository->findBy(['statut' => 'inactive']);
        
        return $this->render('dashAdmin/stationPage.html.twig', [
            'stations' => $inactiveStations
        ]);
    }

    #[Route('/BonplanPage', name: 'bonplan_page')]
    public function bonplanPage(SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Get user profile data
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // Get all users for the list display
        $allUsers = $userRepository->findBy(['deleteFlag' => 0]);
        
        return $this->render('dashAdmin/bonplanPage.html.twig', [
            'user' => $user,
            'allUsers' => $allUsers
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

    #[Route('/admin/station/{id}/approve', name: 'admin_station_approve', methods: ['POST'])]
    public function approveStation(
        int $id,
        StationRepository $stationRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse
    {
        try {
            $station = $stationRepository->find($id);
            
            if (!$station) {
                return new JsonResponse(['success' => false, 'message' => 'Station non trouvée'], 404);
            }
            
            // Update station status to active
            $station->setStatut('active');
            $entityManager->flush();
            
            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => $e->getMessage()], 500);
        }
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
}

?>