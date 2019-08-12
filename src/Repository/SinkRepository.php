<?php

namespace App\Repository;

use App\Entity\Sink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sink|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sink|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sink[]    findAll()
 * @method Sink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sink::class);
    }

    // /**
    //  * @return Sink[] Returns an array of Sink objects
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
    public function findOneBySomeField($value): ?Sink
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
