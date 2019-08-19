<?php

namespace App\Repository;

use App\Entity\Prelevment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Prelevment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prelevment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prelevment[]    findAll()
 * @method Prelevment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrelevmentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Prelevment::class);
    }

    // /**
    //  * @return Prelevment[] Returns an array of Prelevment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prelevment
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
