<?php

namespace App\Controller;


use App\Entity\Product;
use App\Entity\ProductDiscount;
use App\Form\SearchType;
use App\Repository\ProductDiscountRepository;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class PostController extends AbstractController
{
    public  function __construct(ProductRepository $produitRepository)
    {
        $this->repository=$produitRepository;

    }

    /**
     * @Route("/produit/{slug}-{id}", requirements={"slug":"[a-z0-9\-]*"}, name="showProduct")
     */
    public function show(Product $produit, string $slug){
       if($produit->getSlug()!==$slug){
           return $this->redirectToRoute('showProduct',[
               'id'=>$produit->getId(),
               'slug'=>$produit->getSlug()
           ],301);
       }

        return $this->render('/post/show.html.twig',[
                'produit'=>$produit
            ]);
    }


    /**
     * @Route("/eyeGlasse",name="eyeGlasse")
     */
    public function eyeGlasse( Request $request){
        $data=new SearchDataController();
        $data->page=$request->get('page',1);
        $form=$this->createForm(SearchType::class,$data);
        $form->handleRequest($request);
        $produit= $this->repository->findESearch($data);

        return $this->render('/post/sun.html.twig',[
            'produits'=>$produit,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/sunGlasse",name="sunGlasse")
     */
    public function sunGlasse( Request $request){
        $data=new SearchDataController();
        $data->page=$request->get('page',1);
        $form=$this->createForm(SearchType::class,$data);
        $form->handleRequest($request);
        $produit= $this->repository->findSearch($data);

        return $this->render('/post/sun.html.twig',[
            'produits'=>$produit,
            'form'=>$form->createView()
        ]);
    }

    /**
     * Afficher tous les produits
     */
    public function produit(){
        $produit= $this->repository->findAll();
        return $this->render('/post/produit.html.twig',[
            'produit'=>$produit
        ]);
    }


    /**
     * @Route("/promotion",name="promotion")
     */
    public function promotion(){
        $produit=$this->repository->findPromotion();
        return $this->render('/post/promotion.html.twig',[
            'produit'=>$produit
        ]);
    }




}
