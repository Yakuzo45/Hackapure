<?php

namespace App\Repository;

use App\Entity\HomeAppliance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HomeAppliance|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeAppliance|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeAppliance[]    findAll()
 * @method HomeAppliance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeApplianceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HomeAppliance::class);
    }

    // /**
    //  * @return HomeAppliance[] Returns an array of HomeAppliance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HomeAppliance
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
