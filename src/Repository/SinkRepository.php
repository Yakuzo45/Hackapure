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
}
