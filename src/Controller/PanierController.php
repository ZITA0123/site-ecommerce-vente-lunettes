<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, ProductRepository $produitRepository)
    {
        $panier=$session->get('panier',[]);
        $userCart=[];
        foreach ($panier as $id=> $quantite){
            $userCart[]=[
                'produit'=> $produitRepository->find($id),
                'quantite'=>$quantite
            ];
        }
        $total=0;
        foreach ($userCart as $item){
            $total+=$item['produit']->getPrix() * $item['quantite'];
    }
;        return $this->render('panier/index.html.twig', [
            'cart'=>$userCart,
            'total'=>$total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="panier_add")
     */
    public  function add($id, SessionInterface $session){
    $panier=$session->get('panier',[]);
    if(!empty($panier[$id])){
        $panier[$id]++;
    }else{
        $panier[$id]=1;
    }

    $session->set('panier',$panier);
    return $this->redirect($_SERVER['HTTP_REFERER']);
    //   return $this->redirectToRoute("panier");

    }

    /**
     * @Route("/panier/delete/{id}", name="panier_delete")
     */
    public function delete($id, SessionInterface $session){
        $panier=$session->get('panier',[]);
        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $this->redirectToRoute("panier");
    }
}
