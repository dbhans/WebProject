<?php

namespace App\Controller;
use App\Form\Client03;
use App\Entity\Clients03;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class Default03Controller extends Controller
{
    /**
     * @Route("/03", name="All_Welcome03")
     */
    public function index03Action()
    {
		
		
        return $this->render('Default/index03.html.twig');
        //return $this->render('base03.html.twig');

    }

}
