<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/base', name: 'app_base')]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    // Removing duplicate login route that conflicts with SecurityController
    // #[Route('/login', name: 'app_login')] 
    // public function login(): Response
    // {
    //     return $this->render('login/login.html.twig');
    // }
    
    

}

?>