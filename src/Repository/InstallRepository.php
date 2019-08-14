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
}
