<?php

namespace App\Controller;

use App\Entity\Station;
use App\Form\StationType;
use App\Repository\StationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

#[Route('/station')]
final class StationController extends AbstractController
{
    #[Route('/dashEntreprise', name: 'app_dashboard', methods: ['GET'])]
    public function dashboard(SessionInterface $session, StationRepository $stationRepository, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        $userRole = $session->get('user_role');
        
        // Get stations based on user role
        $stations = ($userRole === 'Admin') 
            ? $stationRepository->findAll()
            : $stationRepository->findBy(['user' => $user]);

        return $this->render('dashEntreprise/dashboardEntreprise.html.twig', [
            'stations' => $stations,
            'user' => $user,
        ]);
    }

    #[Route(name: 'app_station_index', methods: ['GET'])]
    public function index(StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        
        // Get active stations for the logged-in user
        $stations = $stationRepository->findActiveStationsByUser($userId);

        return $this->render('station/index.html.twig', [
            'stations' => $stations,
        ]);
    }

    #[Route('/new', name: 'app_station_new', methods: ['GET','POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);

        $station = new Station();
        $station->setUser($user);

        $form = $this->createForm(StationType::class, $station);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($station);
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard');            
        }

        return $this->render('station/new.html.twig', [
            'station' => $station,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idS}', name: 'app_station_show', methods: ['GET'])]
    public function show(StationRepository $stationRepository, $idS, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }

        // Get user from session
        $userId = $session->get('user_id');
        $userRole = $session->get('user_role');

        // Find the station by idS
        $station = $stationRepository->find($idS);
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        // Check if user has access to this station
        if ($userRole !== 'Admin' && $station->getUser()->getIdU() !== $userId) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à cette station.');
        }

        return $this->render('station/show.html.twig', [
            'station' => $station,
        ]);
    }

    #[Route('/{idS}/edit', name: 'app_station_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StationRepository $stationRepository, $idS, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }

        // Get user from session
        $userId = $session->get('user_id');
        $userRole = $session->get('user_role');

        // Find the station by idS
        $station = $stationRepository->find($idS);
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        // Check if user has access to edit this station
        if ($userRole !== 'Admin' && $station->getUser()->getIdU() !== $userId) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à cette station.');
        }

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
    public function delete(Request $request, StationRepository $stationRepository, $idS, EntityManagerInterface $entityManager, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }

        // Get user from session
        $userId = $session->get('user_id');
        $userRole = $session->get('user_role');

        // Find the station by idS
        $station = $stationRepository->find($idS);
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        // Check if user has access to delete this station
        if ($userRole !== 'Admin' && $station->getUser()->getIdU() !== $userId) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à cette station.');
        }

        if ($this->isCsrfTokenValid('delete'.$station->getIdS(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($station);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_dashboard');
    }
}
