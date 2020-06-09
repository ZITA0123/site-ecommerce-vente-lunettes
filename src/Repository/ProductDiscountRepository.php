<?php

namespace App\Repository;

use App\Entity\ProductDiscount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProductDiscount|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductDiscount|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductDiscount[]    findAll()
 * @method ProductDiscount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductDiscountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductDiscount::class);
    }


}
