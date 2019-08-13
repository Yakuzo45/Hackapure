<?php

namespace App\Repository;

use App\Entity\StillWaterBottle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StillWaterBottle|null find($id, $lockMode = null, $lockVersion = null)
 * @method StillWaterBottle|null findOneBy(array $criteria, array $orderBy = null)
 * @method StillWaterBottle[]    findAll()
 * @method StillWaterBottle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StillWaterBottleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StillWaterBottle::class);
    }

    // /**
    //  * @return StillWaterBottle[] Returns an array of StillWaterBottle objects
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
    public function findOneBySomeField($value): ?StillWaterBottle
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
