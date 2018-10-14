<?php

namespace App\Controller;

use App\Form\FullClient01;
use App\Form\Compagny01;
use App\Form\Document01;
use App\Form\Adress01;
use App\Form\Client01;
use App\Entity\Clients01;
use App\Entity\Documents01;
use App\Entity\Compagnies01;
use App\Entity\Adresses01;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;

class Agenda01Controller extends Controller
{
    /**
     * @Route("Agenda01/Week", name="Agenda_week01")
     * 
     */
    public function Week01Action()
    {
        /*
		$Client = new Clients01();
		$Compagny = new Compagnies01();
                $Document = new Documents01();
		$form = $this->createForm(FullClient01::class);
        $form->handleRequest($request);
		
        return $this->render('Client:NewClient01.html.twig', array(
           'form' => $form->createView(),
        ));
*/
    }
    
    /**
     * @Route("Meeting01/Agenda/Month/{idclient}", name="Agenda_meetingmonth01")
     * 
     */
    public function MeeetingMonth01Action($idclient)
    {
        /*
		$Client = new Clients01();
		$Compagny = new Compagnies01();
                $Document = new Documents01();
		$form = $this->createForm(FullClient01::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month01'));
        
        //return $this->redirectToRoute('Month01.html.twig');
        return $this->render('Agenda/MeeetingMonth01.html.twig',['idclient'=>$idclient] );

    }
    
       /**
     * @Route("Agenda01/Month", name="Agenda_month01")
     * 
     */
    public function Month01Action()
    {
        /*
		$Client = new Clients01();
		$Compagny = new Compagnies01();
                $Document = new Documents01();
		$form = $this->createForm(FullClient01::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month01'));
        
        //return $this->redirectToRoute('Month01.html.twig');
        return $this->render('Agenda/Month01.html.twig' );

    }
    
    /**
     * @Route("Agenda01/Essay", name="Agenda_esay01")
     * 
     */
    public function esaw01Action($idclient)
    {
        /*
		$Client = new Clients01();
		$Compagny = new Compagnies01();
                $Document = new Documents01();
		$form = $this->createForm(FullClient01::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month01'));
        
        //return $this->redirectToRoute('Month01.html.twig');
        return $this->render('Agenda/essaye01.html.twig',['idclient'=>$idclient]);

    }
    
    /**
     * @Route("Meeting01/Agenda/Day/{idclient}", name="Agenda_meetingday01")
     * 
     */
    public function Day01Action($idclient)
    {
        /*
		$Client = new Clients01();
		$Compagny = new Compagnies01();
                $Document = new Documents01();
		$form = $this->createForm(FullClient01::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month01'));
        
        //return $this->redirectToRoute('Month01.html.twig');
        return $this->render('Agenda/Meetingday01.html.twig',['idclient'=>$idclient]
               
       );

    }
    /**
     * @Route("Agenda01/Day", name="Agenda_dayagenda01")
     * 
     */
    public function Dayagenda01Action()
    {
        
        return $this->render('Agenda/DayCalendar01.html.twig');

    }
}
