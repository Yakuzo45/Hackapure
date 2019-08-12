<?php

namespace App\Repository;

use App\Entity\UnderSink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UnderSink|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnderSink|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnderSink[]    findAll()
 * @method UnderSink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnderSinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UnderSink::class);
    }

    // /**
    //  * @return UnderSink[] Returns an array of UnderSink objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UnderSink
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
