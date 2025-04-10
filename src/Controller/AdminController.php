<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;
use App\Form\AdminUserEditType;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
    private $userService;
    private $entityManager;
    
    public function __construct(UserService $userService = null, EntityManagerInterface $entityManager)
    {
        $this->userService = $userService;
        $this->entityManager = $entityManager;
    }
    
    #[Route('/dashboardPage', name: 'dashboard_page')]
    public function dashboardPage(UserRepository $userRepository): Response
    {
        // Get user statistics
        $users = $userRepository->findAll();
        $totalUsers = count($users);
        
        // Count active users
        $activeUsers = count(array_filter($users, function($user) {
            return $user->getStatut() === 'active';
        }));
        
        // Count users by role
        $voyageursCount = count(array_filter($users, function($user) {
            return $user->getRoleUser() === 'Voyageurs';
        }));
        
        $entreprisesCount = count(array_filter($users, function($user) {
            return $user->getRoleUser() === 'Entreprise';
        }));
        
        return $this->render('dashAdmin/dashboardPage.html.twig', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'voyageursCount' => $voyageursCount,
            'entreprisesCount' => $entreprisesCount
        ]);
    }

    #[Route('/admin/search-users', name: 'admin_search_users')]
    public function searchUsers(Request $request, UserRepository $userRepository): Response
    {
        $query = $request->query->get('query');
        
        if (!empty($query)) {
            // Search for users by name, first name, or email
            $users = $userRepository->createQueryBuilder('u')
                ->where('u.name LIKE :query')
                ->orWhere('u.prenom LIKE :query')
                ->orWhere('u.email LIKE :query')
                ->setParameter('query', '%' . $query . '%')
                ->getQuery()
                ->getResult();
                
            return $this->render('dashAdmin/dashboardPage.html.twig', [
                'users' => $users,
                'searchPerformed' => true,
                'totalUsers' => count($userRepository->findAll()),
                'activeUsers' => count($userRepository->findBy(['statut' => 'active'])),
                'voyageursCount' => count($userRepository->findBy(['roleUser' => 'Voyageurs'])),
                'entreprisesCount' => count($userRepository->findBy(['roleUser' => 'Entreprise']))
            ]);
        }
        
        return $this->redirectToRoute('dashboard_page');
    }

    #[Route('/UserPage', name: 'user_page')]
    public function UserPage(UserRepository $userRepository): Response
    {
        // Fetch all users from the database
        $users = $userRepository->findAll();
        
        // Pass the users to the template
        return $this->render('dashAdmin/userPage.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/UserPage/edit/{id_U}', name: 'admin_user_edit')]
    public function editUser(Request $request, User $user): Response
    {
        $form = $this->createForm(AdminUserEditType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Check if there's a new password
            $plainPassword = $form->get('password')->getData();
            if (!empty($plainPassword)) {
                $hashedPassword = $this->userService->hashPassword($user, $plainPassword);
                $user->setPassword($hashedPassword);
            }
            
            $this->entityManager->flush();
            
            $this->addFlash('success', 'User information updated successfully.');
            return $this->redirectToRoute('user_page');
        }
        
        return $this->render('dashAdmin/user_edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    #[Route('/UserPage/delete/{id_U}', name: 'admin_user_delete')]
    public function deleteUser(User $user): Response
    {
        // Instead of physically deleting, we can set the deleteFlag to 1
        $user->setDeleteFlag(1);
        
        // Or set status to inactive
        $user->setStatut('inactive');
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'User has been deleted/deactivated successfully.');
        
        return $this->redirectToRoute('user_page');
    }

    #[Route('/StationPage', name: 'station_page')]
    public function stationPage(): Response
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/stationPage.html.twig');
    }

    #[Route('/BonplanPage', name: 'bonplan_page')]
    public function bonplanPage(): Response
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/bonplanPage.html.twig');
    }

    #[Route('/OffrePage', name: 'offre_page')]
    public function offrePage(): Response
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/offrePage.html.twig');
    }

    #[Route('/SocialPage', name: 'social_page')]
    public function socialPage(): Response
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/socialPage.html.twig');
    }

    #[Route('/admin/delete-user/{id}', name: 'admin_delete_user')]
    public function deleteUserPermanently(User $user, EntityManagerInterface $entityManager): Response
    {
        // Delete the user
        $entityManager->remove($user);
        $entityManager->flush();
        
        $this->addFlash('success', 'User deleted successfully.');
        
        return $this->redirectToRoute('dashboard_page');
    }
}

?>