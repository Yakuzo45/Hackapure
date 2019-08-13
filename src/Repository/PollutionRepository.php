<?php

namespace App\Repository;

use App\Entity\Pollution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pollution|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pollution|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pollution[]    findAll()
 * @method Pollution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollutionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pollution::class);
    }

    // /**
    //  * @return Pollution[] Returns an array of Pollution objects
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
    public function findOneBySomeField($value): ?Pollution
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
