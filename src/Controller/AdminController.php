<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreRepository;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    #[Route('/dashboardPage', name: 'dashboard_page')]
    public function dashboardPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/dashboardPage.html.twig');
    }

    #[Route('/UserPage', name: 'user_page')]
    public function UserPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/userPage.html.twig');
    }

    #[Route('/StationPage', name: 'station_page')]
    public function stationPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/stationPage.html.twig');
    }

    #[Route('/BonplanPage', name: 'bonplan_page')]
    public function bonplanPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/bonplanPage.html.twig');
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
    public function socialPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/socialPage.html.twig');
    }
}

?>