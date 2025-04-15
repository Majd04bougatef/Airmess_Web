<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class loginController extends AbstractController
{
    #[Route('/sign-up', name: 'app_signup')]
    public function signup(): Response
    {
        return $this->render('login/sign-up.html.twig');
    }

    #[Route('/dash', name: 'app_dash')]
    public function dash(): Response
    {
        return $this->render('dashAdmin/dashboard.html.twig');
    }

    #[Route('/dashEntreprise', name: 'app_dashEntreprise')]
    public function dashEntreprise(): Response
    {
        return $this->render('dashEntreprise/dashboardEntreprisePage.html.twig');
    }

    #[Route('/dashVoyageurs', name: 'app_dashVoyageurs')]
    public function dashVoyageurs(): Response
    {
        return $this->render('dashVoyageurs/dashboardVoyageursPage.html.twig');
    }
}
?>