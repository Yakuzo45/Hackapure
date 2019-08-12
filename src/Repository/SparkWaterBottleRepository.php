<?php

namespace App\Repository;

use App\Entity\SparkWaterBottle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SparkWaterBottle|null find($id, $lockMode = null, $lockVersion = null)
 * @method SparkWaterBottle|null findOneBy(array $criteria, array $orderBy = null)
 * @method SparkWaterBottle[]    findAll()
 * @method SparkWaterBottle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SparkWaterBottleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SparkWaterBottle::class);
    }

    // /**
    //  * @return SparkWaterBottle[] Returns an array of SparkWaterBottle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SparkWaterBottle
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
