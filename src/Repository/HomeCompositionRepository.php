<?php

namespace App\Repository;

use App\Entity\HomeComposition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HomeComposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeComposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeComposition[]    findAll()
 * @method HomeComposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeCompositionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HomeComposition::class);
    }

    // /**
    //  * @return HomeComposition[] Returns an array of HomeComposition objects
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
    public function findOneBySomeField($value): ?HomeComposition
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
