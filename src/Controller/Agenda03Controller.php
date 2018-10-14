<?php

namespace App\Controller;

use App\Form\FullClient03;
use App\Form\Compagny03;
use App\Form\Document03;
use App\Form\Adress03;
use App\Form\Client03;
use App\Entity\Clients03;
use App\Entity\Documents03;
use App\Entity\Compagnies03;
use App\Entity\Adresses03;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;

class Agenda03Controller extends Controller
{
    /**
     * @Route("Agenda03/Week", name="Agenda_week03")
     * 
     */
    public function Week03Action()
    {
        /*
		$Client = new Clients03();
		$Compagny = new Compagnies03();
                $Document = new Documents03();
		$form = $this->createForm(FullClient03::class);
        $form->handleRequest($request);
		
        return $this->render('Client:NewClient03.html.twig', array(
           'form' => $form->createView(),
        ));
*/
    }
    
    /**
     * @Route("Meeting03/Agenda/Month/{idclient}", name="Agenda_meetingmonth03")
     * 
     */
    public function MeeetingMonth03Action($idclient)
    {
        /*
		$Client = new Clients03();
		$Compagny = new Compagnies03();
                $Document = new Documents03();
		$form = $this->createForm(FullClient03::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month03'));
        
        //return $this->redirectToRoute('Month03.html.twig');
        return $this->render('Agenda/MeeetingMonth03.html.twig',['idclient'=>$idclient] );

    }
    
       /**
     * @Route("Agenda03/Month", name="Agenda_month03")
     * 
     */
    public function Month03Action()
    {
        /*
		$Client = new Clients03();
		$Compagny = new Compagnies03();
                $Document = new Documents03();
		$form = $this->createForm(FullClient03::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month03'));
        
        //return $this->redirectToRoute('Month03.html.twig');
        return $this->render('Agenda/Month03.html.twig' );

    }
    
    /**
     * @Route("Agenda03/Essay", name="Agenda_esay03")
     * 
     */
    public function esaw03Action($idclient)
    {
        /*
		$Client = new Clients03();
		$Compagny = new Compagnies03();
                $Document = new Documents03();
		$form = $this->createForm(FullClient03::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month03'));
        
        //return $this->redirectToRoute('Month03.html.twig');
        return $this->render('Agenda/essaye03.html.twig',['idclient'=>$idclient]);

    }
    
    /**
     * @Route("Meeting03/Agenda/Day/{idclient}", name="Agenda_meetingday03")
     * 
     */
    public function Day03Action($idclient)
    {
        /*
		$Client = new Clients03();
		$Compagny = new Compagnies03();
                $Document = new Documents03();
		$form = $this->createForm(FullClient03::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month03'));
        
        //return $this->redirectToRoute('Month03.html.twig');
        return $this->render('Agenda/Meetingday03.html.twig',['idclient'=>$idclient]
               
       );

    }
    /**
     * @Route("Agenda03/Day", name="Agenda_dayagenda03")
     * 
     */
    public function Dayagenda03Action()
    {
        
        return $this->render('Agenda/DayCalendar03.html.twig'
               
       );

    }
}
