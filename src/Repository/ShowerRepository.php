<?php

namespace App\Repository;

use App\Entity\Shower;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Shower|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shower|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shower[]    findAll()
 * @method Shower[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Shower::class);
    }
}
