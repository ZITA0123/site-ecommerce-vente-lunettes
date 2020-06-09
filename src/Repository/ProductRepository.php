<?php

namespace App\Repository;

use App\Controller\SearchDataController;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry,PaginatorInterface $paginator)
    {
        parent::__construct($registry, Product::class);
        $this->paginator=$paginator;
    }
    /**
     * @return Product
     */
    public function findProduit():array
    {
        return $this->createQueryBuilder('p')
            ->where('p.disponible = true')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return Product
     */
    public function findPromotion():array
    {
        return $this->createQueryBuilder('p')
            ->Join('p.productsDiscount','d')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return PaginationInterface
     */
    public function findESearch(SearchDataController $search):PaginationInterface
    {
        $query=$this->createQueryBuilder('p')
            ->where('p.categorie=1')

        ;
        if(!empty($search->q)){
            $query=$query
                ->andWhere('p.designation LIKE :q')
                ->setParameter('q',"%{$search->q}%" );
        }
        if(!empty($search->min)){
            $query=$query
                ->andWhere('p.prix >= :min')
                ->setParameter('min',$search->min );
        }
        if(!empty($search->max)){
            $query=$query
                ->andWhere('p.prix <= :max')
                ->setParameter('max',$search->max );
        }

        $query= $query->getQuery();

        return $this->paginator->paginate($query,
            $search->page,
            30);
    }

    /**
     * @return Product
     */
    public function search():array
    {
        return $this->createQueryBuilder('p')
            ->where('p.disponible = true and description like %lunette% ')
            ->getQuery()
            ->getResult()
            ;
    }
    /**
     * @return PaginationInterface
     */
    public function findSearch(SearchDataController $search):PaginationInterface
    {
        $query=$this->createQueryBuilder('p')
            ->where('p.categorie=2')

        ;
        if(!empty($search->q)){
            $query=$query
                ->andWhere('p.designation LIKE :q')
                ->setParameter('q',"%{$search->q}%" );
        }
        if(!empty($search->min)){
            $query=$query
                ->andWhere('p.prix >= :min')
                ->setParameter('min',$search->min );
        }
        if(!empty($search->max)) {
            $query = $query
                ->andWhere('p.prix <= :max')
                ->setParameter('max', $search->max);
        }
        if(!empty($search->promo)){
            $query=$query
                ->andWhere('p.solde = 1');
        }

        $query= $query->getQuery();

        return $this->paginator->paginate($query,
            $search->page,
            30);
    }


}
