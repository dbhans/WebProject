<?php

namespace App\Controller;
use App\Form\Client;
use App\Entity\Clients;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="All_Welcome")
     */
    public function indexAction()
    {
		
		
        return $this->render('Default/index.html.twig');
        //return $this->render('base.html.twig');

    }

            /**
     * @Route("/Default", name="All_error")
     */
    public function indeterminationtAction()
    {
		
		
        return $this->render('Default/Allerror.html.twig');
        

    }
}
