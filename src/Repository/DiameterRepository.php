<?php

namespace App\Repository;

use App\Entity\Diameter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Diameter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diameter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diameter[]    findAll()
 * @method Diameter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiameterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Diameter::class);
    }

    // /**
    //  * @return Diameter[] Returns an array of Diameter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Diameter
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
