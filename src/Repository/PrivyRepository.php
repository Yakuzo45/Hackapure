<?php

namespace App\Repository;

use App\Entity\Privy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Privy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Privy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Privy[]    findAll()
 * @method Privy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Privy::class);
    }

    // /**
    //  * @return Privy[] Returns an array of Privy objects
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
    public function findOneBySomeField($value): ?Privy
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
