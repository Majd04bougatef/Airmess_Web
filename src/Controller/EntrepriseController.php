<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class EntrepriseController extends AbstractController{

    #[Route('/dashboardEntreprisePage', name: 'dashboardEntreprise_page')]
    public function dashboardEntreprisePage()
    {
        return $this->render('dashEntreprise/dashboardEntreprisePage.html.twig');
    }

    #[Route('/UserEntreprisePage', name: 'userEntreprise_page')]
    public function UserEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/userPageEntreprise.html.twig');
    }

    #[Route('/StationEntreprisePage', name: 'stationEntreprise_page')]
    public function stationEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/stationPageEntreprise.html.twig');
    }

    #[Route('/BonplanEntreprisePage', name: 'bonplanEntreprise_page')]
    public function bonplanEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/bonplanPageEntreprise.html.twig');
    }

    #[Route('/OffreEntreprisePage', name: 'offreEntreprise_page')]
    public function offreEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/offrePageEntreprise.html.twig');
    }

    #[Route('/SocialEntreprisePage', name: 'socialEntreprise_page')]
    public function socialEntreprisePage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashEntreprise/socialPageEntreprise.html.twig');
    }
}

?>
