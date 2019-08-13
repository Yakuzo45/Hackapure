<?php

namespace App\Repository;

use App\Entity\WaterHeater;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WaterHeater|null find($id, $lockMode = null, $lockVersion = null)
 * @method WaterHeater|null findOneBy(array $criteria, array $orderBy = null)
 * @method WaterHeater[]    findAll()
 * @method WaterHeater[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WaterHeaterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WaterHeater::class);
    }

    // /**
    //  * @return WaterHeater[] Returns an array of WaterHeater objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WaterHeater
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
