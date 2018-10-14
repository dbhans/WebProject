<?php

namespace App\Controller;
use App\Form\Client02;
use App\Entity\Clients02;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Default02Controller extends Controller
{
    /**
     * @Route("/02", name="All_Welcome02")
     */
    public function index02Action()
    {
		
		
        return $this->render('Default/index02.html.twig');
        //return $this->render('base02.html.twig');

    }

}
