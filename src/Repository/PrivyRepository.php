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
}
