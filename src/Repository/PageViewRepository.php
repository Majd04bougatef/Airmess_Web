<?php

namespace App\Repository;

use App\Entity\PageView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PageView>
 */
class PageViewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageView::class);
    }

    /**
     * Get total page views count
     */
    public function getTotalPageViews(): int
    {
        return $this->createQueryBuilder('pv')
            ->select('COUNT(pv.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Get page views grouped by day for the last X days
     */
    public function getPageViewsByDay(int $days = 30): array
    {
        $date = new \DateTime();
        $date->modify('-' . $days . ' days');
        
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
            SELECT DATE(pv.view_date) as date, COUNT(pv.id) as count
            FROM page_views pv
            WHERE pv.view_date >= :date
            GROUP BY DATE(pv.view_date)
            ORDER BY date ASC
        ';
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('date', $date->format('Y-m-d'));
        $result = $stmt->executeQuery();
        
        return $result->fetchAllAssociative();
    }

    /**
     * Get most viewed pages
     */
    public function getMostViewedPages(int $limit = 10): array
    {
        return $this->createQueryBuilder('pv')
            ->select('pv.path, pv.pageTitle, COUNT(pv.id) as viewCount')
            ->groupBy('pv.path, pv.pageTitle')
            ->orderBy('viewCount', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Get page views for today
     */
    public function getTodayPageViews(): int
    {
        $today = new \DateTime('today');
        
        return $this->createQueryBuilder('pv')
            ->select('COUNT(pv.id)')
            ->where('pv.viewDate >= :today')
            ->setParameter('today', $today)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Get page views for current month
     */
    public function getCurrentMonthPageViews(): int
    {
        $firstDayOfMonth = new \DateTime('first day of this month midnight');
        
        return $this->createQueryBuilder('pv')
            ->select('COUNT(pv.id)')
            ->where('pv.viewDate >= :firstDay')
            ->setParameter('firstDay', $firstDayOfMonth)
            ->getQuery()
            ->getSingleScalarResult();
    }
} 