<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="app_home")
     */
    public function home(ProductRepository $produitRepository)
    {
        $produit=$produitRepository->findProduit();

        return $this->render('home/index.html.twig',[
            'produits'=> $produit
        ]);
    }

    /**
     * @Route("/aboutUs", name="about_us")
     */
    public function about()
    {
        return $this->render('home/about_us.html.twig');
    }



}
