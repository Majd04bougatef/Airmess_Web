<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/OffrePage', name: 'offre_page')]
    public function offrePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/offrePage.html.twig');
    }

    #[Route('/SocialPage', name: 'social_page')]
    public function socialPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashAdmin/socialPage.html.twig');
    }
}

?>