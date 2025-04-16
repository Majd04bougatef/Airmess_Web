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
