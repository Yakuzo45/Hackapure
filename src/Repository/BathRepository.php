<?php

namespace App\Repository;

use App\Entity\Bath;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bath|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bath|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bath[]    findAll()
 * @method Bath[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BathRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bath::class);
    }

}
