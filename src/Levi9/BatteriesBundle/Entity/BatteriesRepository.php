<?php

namespace Levi9\BatteriesBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BatteriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BatteriesRepository extends EntityRepository
{
    /**
     * Returns statistics.
     *
     * @return array
     */
    public function getStatistics()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select(['b.type'])
            ->addSelect('SUM(b.count) AS stat_count')
            ->from('Levi9BatteriesBundle:Batteries', 'b')
            ->groupBy('b.type')
            ->getQuery()
            ->getResult()
        ;
    }
}