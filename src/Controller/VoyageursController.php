<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\SocialMediaRepository;

class VoyageursController extends AbstractController{


    #[Route('/dashboardVoyageursPage', name: 'dashboardVoyageurs_page')]
    public function dashboardVoyageursPage()
    {
        return $this->render('dashVoyageurs/dashboardVoyageursPage.html.twig');
    }

    #[Route('/UserVoyageursPage', name: 'userVoyageurs_page')]
    public function UserVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/userPageVoyageurs.html.twig');
    }

    #[Route('/StationVoyageursPage', name: 'stationVoyageurs_page')]
    public function stationVoyageursPage()
    {
        return $this->render('dashVoyageurs/stationPageVoyageurs.html.twig');
    }

    #[Route('/BonplanVoyageursPage', name: 'bonplanVoyageurs_page')]
    public function bonplanVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/bonplanPageVoyageurs.html.twig');
    }

    #[Route('/OffreVoyageursPage', name: 'offreVoyageurs_page')]
    public function offreVoyageursPage()
    {
        // Vous pouvez ajouter ici des données à passer à la vue
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig');
    }

    #[Route('/SocialVoyageursPage', name: 'socialVoyageurs_page')]
    public function socialVoyageursPage(SocialMediaRepository $socialMediaRepository)
    {
        // Récupérer les 6 publications les plus récentes
        $publications = $socialMediaRepository->createQueryBuilder('s')
            ->leftJoin('s.user', 'u')
            ->select('s', 'u')
            ->orderBy('s.publicationDate', 'DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
            
        // Passer les publications à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig', [
            'publications' => $publications
        ]);
    }
    
    #[Route('/OffreForm', name: 'offre_form')]
    public function offreForm(): Response
    {
        return $this->render('dashVoyageurs/offreForm.html.twig');
    }
}

?>