<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SearchDataController extends AbstractController
{
    /**
     *@var int
     */
    public $page=1;
    /**
     * @var string
     */
    public  $q='';
    /**
     * @var Categorie[]
     */
    public $categories=[];

      /**
       * @var null|integer
       */
      public $max;
    /**
     * @var null|integer
     */
    public $min;

    /**
     * @var null|integer
     */
    public $promo;


}
