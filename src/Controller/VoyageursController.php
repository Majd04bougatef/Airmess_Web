<?php

namespace App\Controller;

use App\Service\AuthService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

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
        
        return $this->render('dashVoyageurs/dashboardVoyageursPage.html.twig');
    }

    #[Route('/UserVoyageursPage', name: 'userVoyageurs_page')]
    public function UserVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/userPageVoyageurs.html.twig');
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
    public function bonplanVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/bonplanPageVoyageurs.html.twig');
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
    public function socialVoyageursPage(): Response
    {
        // Check if user is authenticated
        if ($redirectResponse = $this->checkAuthentication()) {
            return $redirectResponse;
        }
        
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig');
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
}

?>