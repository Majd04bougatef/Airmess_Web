<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class EntrepriseController extends AbstractController{

    #[Route('/dashboardEntreprisePage', name: 'dashboardEntreprise_page')]
    public function dashboardEntreprisePage(UserRepository $userRepository = null, SessionInterface $session = null): Response
    {
        // Get user profile data if repository and session are available
        $user = null;
        if ($session && $userRepository && $session->has('user_id')) {
            $userId = $session->get('user_id');
            $user = $userRepository->find($userId);
        }
        
        return $this->render('dashEntreprise/dashboardEntreprise.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/UserEntreprisePage', name: 'userEntreprise_page')]
    public function UserEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/dashboardEntreprise.html.twig');
    }

    #[Route('/StationEntreprisePage', name: 'stationEntreprise_page')]
    public function stationEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/stationPageEntreprise.html.twig');
    }

    #[Route('/ProfileEntreprisePage', name: 'profileEntreprise_page')]
    public function profileEntreprisePage(UserRepository $userRepository = null, SessionInterface $session = null): Response
    {
        // Get user profile data if repository and session are available
        $user = null;
        if ($session && $userRepository && $session->has('user_id')) {
            $userId = $session->get('user_id');
            $user = $userRepository->find($userId);
        }
        
        return $this->render('dashEntreprise/profilePageEntreprise.html.twig', [
            'user' => $user,
            'showProfile' => true
        ]);
    }

    #[Route('/ProfileEntrepriseEdit', name: 'profileEntreprise_edit')]
    public function profileEntrepriseEdit(UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        return $this->render('dashEntreprise/profileEntrepriseEdit.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/OffreEntreprisePage', name: 'offreEntreprise_page')]
    public function offreEntreprisePage(Request $request, EntityManagerInterface $entityManager, OffreRepository $offreRepository): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre);
            $entityManager->flush();

            $this->addFlash('success', 'Offre créée avec succès !');
            return $this->redirectToRoute('offreEntreprise_page');
        }

        // Récupérer toutes les offres
        $offres = $offreRepository->findAll();

        return $this->render('dashEntreprise/offrePageEntreprise.html.twig', [
            'form' => $form->createView(),
            'offres' => $offres,
        ]);
    }

    #[Route('/SocialEntreprisePage', name: 'socialEntreprise_page')]
    public function socialEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/socialPageEntreprise.html.twig');
    }
}

?>
