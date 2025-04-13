<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\SocialMediaRepository;
use Knp\Component\Pager\PaginatorInterface;

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
    public function socialVoyageursPage(Request $request, SocialMediaRepository $socialMediaRepository, PaginatorInterface $paginator)
    {
        // Récupérer toutes les publications
        $query = $socialMediaRepository->createQueryBuilder('s')
            ->leftJoin('s.user', 'u')
            ->select('s', 'u')
            ->orderBy('s.publicationDate', 'DESC')
            ->getQuery();
            
        // Paginer les résultats
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), // Numéro de page, 1 par défaut
            6 // Nombre d'éléments par page
        );
            
        // Passer les publications paginées à la vue
        return $this->render('dashVoyageurs/socialPageVoyageurs.html.twig', [
            'publications' => $pagination
        ]);
    }
    
    #[Route('/OffreForm', name: 'offre_form')]
    public function offreForm(): Response
    {
        return $this->render('dashVoyageurs/offreForm.html.twig');
    }
}

?>