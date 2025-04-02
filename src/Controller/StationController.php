<?php

namespace App\Controller;

use App\Entity\Station;
use App\Form\StationType;
use App\Repository\StationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

#[Route('/station')]
final class StationController extends AbstractController
{
    #[Route(name: 'app_station_index', methods: ['GET'])]
    public function index(StationRepository $stationRepository): Response
    {
        return $this->render('station/index.html.twig', [
            'stations' => $stationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_station_new', methods: ['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        $station = new Station();
        $user = $userRepository->find(40);        
        $station->setUser($user);
        

        $form = $this->createForm(StationType::class, $station);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($station);
            $entityManager->flush();

            return $this->render('dashEntreprise/dashboardEntreprise.html.twig');            
        }

        return $this->render('station/new.html.twig', [
            'station' => $station,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idS}', name: 'app_station_show', methods: ['GET'])]
    public function show(Station $station): Response
    {
        return $this->render('station/show.html.twig', [
            'station' => $station,
        ]);
    }

    #[Route('/{idS}/edit', name: 'app_station_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Station $station, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StationType::class, $station);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_station_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('station/edit.html.twig', [
            'station' => $station,
            'form' => $form,
        ]);
    }

    #[Route('/{idS}', name: 'app_station_delete', methods: ['POST'])]
    public function delete(Request $request, Station $station, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$station->getIdS(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($station);
            $entityManager->flush();
        }

        return $this->render('dashEntreprise/dashboardEntreprise.html.twig');
    }

    

    #[Route('/dashEntreprise', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('dashEntreprise/dashboardEntreprise.html.twig');
    }

}
