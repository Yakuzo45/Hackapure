<?php

namespace App\Repository;

use App\Entity\Install;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Install|null find($id, $lockMode = null, $lockVersion = null)
 * @method Install|null findOneBy(array $criteria, array $orderBy = null)
 * @method Install[]    findAll()
 * @method Install[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstallRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Install::class);
    }

    // /**
    //  * @return Install[] Returns an array of Install objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Install
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
