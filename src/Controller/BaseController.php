<?php

namespace App\Controller;

use App\Repository\SocialMediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    #[Route('/base', name: 'app_base')]
    public function index(SocialMediaRepository $socialMediaRepository): Response
    {
        // Récupérer les 4 publications sociales les plus aimées
        $mostLiked = $socialMediaRepository->findMostLiked(8);
        
        // Mélanger et prendre 4 publications aléatoirement
        shuffle($mostLiked);
        $randomPublications = array_slice($mostLiked, 0, 4);
        
        // Si on n'a pas assez de publications, compléter avec des publications aléatoires
        if (count($randomPublications) < 4) {
            $random = $socialMediaRepository->findRandom(4 - count($randomPublications));
            $publications = array_merge($randomPublications, $random);
            
            // Empêcher les doublons
            $uniquePublications = [];
            foreach ($publications as $pub) {
                $uniquePublications[$pub->getIdEB()] = $pub;
                if (count($uniquePublications) >= 4) {
                    break;
                }
            }
            $socialMedia = array_values($uniquePublications);
        } else {
            $socialMedia = $randomPublications;
        }
        
        return $this->render('base.html.twig', [
            'socialMedia' => $socialMedia
        ]);
    }
}

?>