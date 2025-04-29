<?php

namespace App\Controller\DashEntreprise;

use App\Repository\StationRepository;
use App\Repository\ReservationTransportRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{
    #[Route('/entreprise/stats', name: 'app_entreprise_stats')]
    public function index(
        StationRepository $stationRepository, 
        ReservationTransportRepository $reservationRepository,
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
        
        // Get only stations owned by this user/entreprise
        $stations = $stationRepository->findBy(['user' => $user]);
        
        if (empty($stations)) {
            return $this->render('dashEntreprise/stats.html.twig', [
                'user' => $user,
                'noStations' => true
            ]);
        }
        
        // Stats for each station
        $stationStats = [];
        $totalReservations = 0;
        $totalRevenue = 0;
        $totalBikes = 0;
        $availableBikes = 0;
        
        foreach ($stations as $station) {
            // Get reservations for this station
            $stationReservations = $reservationRepository->findBy(['station' => $station]);
            
            // Calculate station statistics
            $stationRevenue = $this->calculateStationRevenue($stationReservations);
            $activeReservations = $this->countActiveReservations($stationReservations);
            $reservationCount = count($stationReservations);
            $occupancyRate = $this->calculateStationOccupancyRate($station, $stationReservations);
            
            // Add to totals
            $totalReservations += $reservationCount;
            $totalRevenue += $stationRevenue;
            $totalBikes += $station->getNombreVelo();
            $availableBikes += ($station->getNombreVelo() - $activeReservations);
            
            // Get monthly stats for this station
            $monthlyStats = $this->getMonthlyStatsForStation($reservationRepository, $station);
            
            $stationStats[] = [
                'station' => $station,
                'revenue' => $stationRevenue,
                'activeReservations' => $activeReservations,
                'totalReservations' => $reservationCount,
                'occupancyRate' => $occupancyRate,
                'monthlyLabels' => $monthlyStats['labels'],
                'monthlyData' => $monthlyStats['data']
            ];
        }
        
        // Calculate overall metrics
        $bikeUtilization = $totalBikes > 0 ? (($totalBikes - $availableBikes) / $totalBikes) * 100 : 0;
        
        return $this->render('dashEntreprise/stats.html.twig', [
            'user' => $user,
            'stationStats' => $stationStats,
            'totalReservations' => $totalReservations,
            'totalRevenue' => $totalRevenue,
            'totalBikes' => $totalBikes,
            'availableBikes' => $availableBikes,
            'bikeUtilization' => $bikeUtilization
        ]);
    }
    
    private function calculateStationRevenue(array $reservations): float
    {
        $total = 0;
        foreach ($reservations as $reservation) {
            $total += $reservation->getPrix();
        }
        return $total;
    }
    
    private function countActiveReservations(array $reservations): int
    {
        $count = 0;
        foreach ($reservations as $reservation) {
            if ($reservation->getStatut() === 'active') {
                $count++;
            }
        }
        return $count;
    }
    
    private function calculateStationOccupancyRate($station, array $reservations): float
    {
        $totalCapacity = $station->getCapacite();
        if ($totalCapacity <= 0) {
            return 0;
        }
        
        $activeReservations = $this->countActiveReservations($reservations);
        return ($activeReservations / $totalCapacity) * 100;
    }
    
    private function getMonthlyStatsForStation(ReservationTransportRepository $reservationRepository, $station): array
    {
        // Get reservations for the last 6 months
        $endDate = new \DateTime();
        $startDate = (clone $endDate)->modify('-6 months');
        
        $reservations = $reservationRepository->findByDateRangeAndStation($startDate, $endDate, $station);
        
        // Group by month
        $monthlyData = [];
        $currentDate = clone $startDate;
        
        while ($currentDate <= $endDate) {
            $monthKey = $currentDate->format('M Y');
            $monthlyData[$monthKey] = 0;
            $currentDate->modify('+1 month');
        }
        
        foreach ($reservations as $reservation) {
            $monthKey = $reservation->getDateRes()->format('M Y');
            if (isset($monthlyData[$monthKey])) {
                $monthlyData[$monthKey]++;
            }
        }
        
        return [
            'labels' => array_keys($monthlyData),
            'data' => array_values($monthlyData)
        ];
    }
} 