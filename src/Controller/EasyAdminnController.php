<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductDiscount;
use App\Entity\User;
use App\Repository\ProductDiscountRepository;
use App\Repository\ProductRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class EasyAdminnController extends EasyAdminController
{
    public  function __construct(ProductRepository $productRepository,ProductDiscountRepository $discountRepository)
    {
        $this->repository=$productRepository;
        $this->repositoryD=$discountRepository;


    }
    // resource: '@EasyAdminBundle/Controller/EasyAdminController.php'
    /**
     * @Route("/easy/adminn", name="easy_adminn")
     */

    public function  persistEntity($entity)
    {
        if (method_exists($entity, 'setProductId')) {
            $manager = $this->getDoctrine()->getManager();
            $product=$this->repository->find($entity->getProductId());
            $product->setSolde(true);
            $manager->persist($product);
            $manager->flush();
            parent::persistEntity($entity);
        }
        else{
            parent::persistEntity($entity);
        }



    }

}
