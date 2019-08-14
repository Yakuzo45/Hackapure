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
}
