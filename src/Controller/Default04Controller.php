<?php

namespace App\Controller;
use App\Form\Client04;
use App\Entity\Clients04;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Default04Controller extends Controller
{
    /**
     * @Route("/04", name="All_Welcome04")
     */
    public function index04Action()
    {
		
		
        return $this->render('Default/index04.html.twig');
        //return $this->render('base04.html.twig');

    }

}
