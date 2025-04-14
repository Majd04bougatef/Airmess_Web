<?php

namespace App\Controller\DashEntreprise;

use App\Entity\Station;
use App\Entity\Reservation;
use App\Repository\StationRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AnalyticsController extends AbstractController
{
    #[Route('/entreprise/analytics', name: 'app_entreprise_analytics')]
    public function index(
        StationRepository $stationRepository, 
        ReservationRepository $reservationRepository,
        SessionInterface $session,
        UserRepository $userRepository
    ): Response
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

        // Get reservations for the user's stations
        $reservations = [];
        foreach ($stations as $station) {
            $stationReservations = $reservationRepository->findBy(['station' => $station]);
            $reservations = array_merge($reservations, $stationReservations);
        }

        // Calculate key metrics
        $totalRevenue = $this->calculateTotalRevenue($reservations);
        $activeUsers = $this->countActiveUsers($reservations);
        $bikeUtilization = $this->calculateBikeUtilization($stations, $reservations);
        $averageRideDuration = $this->calculateAverageRideDuration($reservations);

        // Get station performance data
        $stationPerformance = $this->getStationPerformance($stations, $reservations);

        return $this->render('dashEntreprise/analytics.html.twig', [
            'totalRevenue' => $totalRevenue,
            'activeUsers' => $activeUsers,
            'bikeUtilization' => $bikeUtilization,
            'averageRideDuration' => $averageRideDuration,
            'stationPerformance' => $stationPerformance,
            'user' => $user,
        ]);
    }

    #[Route('/entreprise/analytics/usage', name: 'app_entreprise_analytics_usage')]
    public function getUsageData(
        ReservationRepository $reservationRepository,
        StationRepository $stationRepository,
        SessionInterface $session,
        UserRepository $userRepository
    ): JsonResponse
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return new JsonResponse(['error' => 'Not authenticated'], 401);
        }

        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        $userRole = $session->get('user_role');

        // Get stations based on user role
        $stations = ($userRole === 'Admin') 
            ? $stationRepository->findAll()
            : $stationRepository->findBy(['user' => $user]);

        $usageData = $this->calculateUsageTrends($reservationRepository, $stations);
        return new JsonResponse($usageData);
    }

    #[Route('/entreprise/analytics/revenue', name: 'app_entreprise_analytics_revenue')]
    public function getRevenueData(
        ReservationRepository $reservationRepository,
        StationRepository $stationRepository,
        SessionInterface $session,
        UserRepository $userRepository
    ): JsonResponse
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return new JsonResponse(['error' => 'Not authenticated'], 401);
        }

        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        $userRole = $session->get('user_role');

        // Get stations based on user role
        $stations = ($userRole === 'Admin') 
            ? $stationRepository->findAll()
            : $stationRepository->findBy(['user' => $user]);

        $revenueData = $this->calculateRevenueData($reservationRepository, $stations);
        return new JsonResponse($revenueData);
    }

    private function calculateTotalRevenue(array $reservations): float
    {
        $total = 0;
        foreach ($reservations as $reservation) {
            $total += $reservation->getPrix();
        }
        return $total;
    }

    private function countActiveUsers(array $reservations): int
    {
        $userIds = [];
        foreach ($reservations as $reservation) {
            $user = $reservation->getUser();
            if ($user && !in_array($user->getIdU(), $userIds)) {
                $userIds[] = $user->getIdU();
            }
        }
        return count($userIds);
    }

    private function calculateBikeUtilization(array $stations, array $reservations): float
    {
        $totalBikes = 0;
        $usedBikes = 0;

        foreach ($stations as $station) {
            $totalBikes += $station->getNombreVelo();
        }

        foreach ($reservations as $reservation) {
            if ($reservation->getStatut() === 'active') {
                $usedBikes++;
            }
        }

        return $totalBikes > 0 ? ($usedBikes / $totalBikes) * 100 : 0;
    }

    private function calculateAverageRideDuration(array $reservations): int
    {
        $totalDuration = 0;
        $count = 0;

        foreach ($reservations as $reservation) {
            if ($reservation->getDateFin()) {
                $duration = $reservation->getDateFin()->getTimestamp() - $reservation->getDateRes()->getTimestamp();
                $totalDuration += $duration;
                $count++;
            }
        }

        return $count > 0 ? round($totalDuration / $count / 60) : 0;
    }

    private function getStationPerformance(array $stations, array $reservations): array
    {
        $performance = [];
        foreach ($stations as $station) {
            $stationReservations = array_filter($reservations, function($reservation) use ($station) {
                return $reservation->getStation() === $station;
            });

            $availability = $this->calculateStationAvailability($station, $stationReservations);
            $dailyRides = $this->countDailyRides($stationReservations);
            $dailyRevenue = $this->calculateDailyRevenue($stationReservations);

            $performance[] = [
                'name' => $station->getNom(),
                'availability' => $availability,
                'dailyRides' => $dailyRides,
                'dailyRevenue' => $dailyRevenue,
            ];
        }

        return $performance;
    }

    private function calculateStationAvailability(Station $station, array $reservations): float
    {
        $totalBikes = $station->getNombreVelo();
        $availableBikes = $totalBikes;

        foreach ($reservations as $reservation) {
            if ($reservation->getStatut() === 'active') {
                $availableBikes--;
            }
        }

        return $totalBikes > 0 ? ($availableBikes / $totalBikes) * 100 : 0;
    }

    private function countDailyRides(array $reservations): int
    {
        $today = new \DateTime();
        $today->setTime(0, 0, 0);

        return count(array_filter($reservations, function($reservation) use ($today) {
            return $reservation->getDateRes()->format('Y-m-d') === $today->format('Y-m-d');
        }));
    }

    private function calculateDailyRevenue(array $reservations): float
    {
        $today = new \DateTime();
        $today->setTime(0, 0, 0);

        $dailyReservations = array_filter($reservations, function($reservation) use ($today) {
            return $reservation->getDateRes()->format('Y-m-d') === $today->format('Y-m-d');
        });

        $total = 0;
        foreach ($dailyReservations as $reservation) {
            $total += $reservation->getPrix();
        }

        return $total;
    }

    private function calculateUsageTrends(ReservationRepository $reservationRepository, array $stations): array
    {
        // Get reservations for the last 6 months
        $endDate = new \DateTime();
        $startDate = (clone $endDate)->modify('-6 months');

        $reservations = [];
        foreach ($stations as $station) {
            $stationReservations = $reservationRepository->findByDateRangeAndStation($startDate, $endDate, $station);
            $reservations = array_merge($reservations, $stationReservations);
        }

        // Group by month
        $monthlyData = [];
        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            $monthKey = $currentDate->format('M');
            $monthlyData[$monthKey] = 0;
            $currentDate->modify('+1 month');
        }

        foreach ($reservations as $reservation) {
            $monthKey = $reservation->getDateRes()->format('M');
            $monthlyData[$monthKey]++;
        }

        return [
            'labels' => array_keys($monthlyData),
            'data' => array_values($monthlyData)
        ];
    }

    private function calculateRevenueData(ReservationRepository $reservationRepository, array $stations): array
    {
        // Get reservations for the last week
        $endDate = new \DateTime();
        $startDate = (clone $endDate)->modify('-7 days');

        $reservations = [];
        foreach ($stations as $station) {
            $stationReservations = $reservationRepository->findByDateRangeAndStation($startDate, $endDate, $station);
            $reservations = array_merge($reservations, $stationReservations);
        }

        // Group by day
        $dailyData = [];
        $currentDate = clone $startDate;

        while ($currentDate <= $endDate) {
            $dayKey = $currentDate->format('D');
            $dailyData[$dayKey] = 0;
            $currentDate->modify('+1 day');
        }

        foreach ($reservations as $reservation) {
            $dayKey = $reservation->getDateRes()->format('D');
            $dailyData[$dayKey] += $reservation->getPrix();
        }

        return [
            'labels' => array_keys($dailyData),
            'data' => array_values($dailyData)
        ];
    }
} 