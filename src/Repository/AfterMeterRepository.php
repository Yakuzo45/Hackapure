<?php

namespace App\Repository;

use App\Entity\AfterMeter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AfterMeter|null find($id, $lockMode = null, $lockVersion = null)
 * @method AfterMeter|null findOneBy(array $criteria, array $orderBy = null)
 * @method AfterMeter[]    findAll()
 * @method AfterMeter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AfterMeterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AfterMeter::class);
    }

}
