<?php

namespace App\Controller;

use App\Form\Client01;
use App\Entity\Clients01;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Default01Controller extends Controller
{
    /**
     * @Route("/01", name="All_Welcome01")
     */
    public function index01Action()
    {
		
		
        return $this->render('Default/index01.html.twig');
        //return $this->render('base01.html.twig');

    }

}
