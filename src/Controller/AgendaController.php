<?php

namespace App\Controller;

use App\Form\FullClient;
use App\Form\Compagny;
use App\Form\Document;
use App\Form\Adress;
use App\Form\Client;
use App\Entity\Clients;
use App\Entity\Documents;
use App\Entity\Compagnies;
use App\Entity\Adresses;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;

class AgendaController extends Controller
{
    /**
     * @Route("Agenda/Week", name="Agenda_week")
     * 
     */
    public function WeekAction()
    {
        /*
		$Client = new Clients();
		$Compagny = new Compagnies();
                $Document = new Documents();
		$form = $this->createForm(FullClient::class);
        $form->handleRequest($request);
		
        return $this->render('Client:NewClient.html.twig', array(
           'form' => $form->createView(),
        ));
*/
    }
    
    /**
     * @Route("Meeting/Agenda/Month/{idclient}", name="Agenda_meetingmonth")
     * 
     */
    public function MeeetingMonthAction($idclient)
    {
        /*
		$Client = new Clients();
		$Compagny = new Compagnies();
                $Document = new Documents();
		$form = $this->createForm(FullClient::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month'));
        
        //return $this->redirectToRoute('Month.html.twig');
        return $this->render('Agenda/MeeetingMonth.html.twig',['idclient'=>$idclient] );

    }
    
       /**
     * @Route("Agenda/Month", name="Agenda_month")
     * 
     */
    public function MonthAction()
    {
        /*
		$Client = new Clients();
		$Compagny = new Compagnies();
                $Document = new Documents();
		$form = $this->createForm(FullClient::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month'));
        
        //return $this->redirectToRoute('Month.html.twig');
        return $this->render('Agenda/Month.html.twig' );

    }
    
    /**
     * @Route("Agenda/Essay", name="Agenda_esay")
     * 
     */
    public function esawAction($idclient)
    {
        /*
		$Client = new Clients();
		$Compagny = new Compagnies();
                $Document = new Documents();
		$form = $this->createForm(FullClient::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month'));
        
        //return $this->redirectToRoute('Month.html.twig');
        return $this->render('Agenda/essaye.html.twig',['idclient'=>$idclient]);

    }
    
    /**
     * @Route("Meeting/Agenda/Day/{idclient}", name="Agenda_meetingday")
     * 
     */
    public function DayAction($idclient)
    {
        /*
		$Client = new Clients();
		$Compagny = new Compagnies();
                $Document = new Documents();
		$form = $this->createForm(FullClient::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month'));
        
        //return $this->redirectToRoute('Month.html.twig');
        return $this->render('Agenda/Meetingday.html.twig',['idclient'=>$idclient]
               
       );

    }
    /**
     * @Route("Agenda/Day", name="Agenda_dayagenda")
     * 
     */
    public function DayagendaAction()
    {
        
        return $this->render('Agenda/DayCalendar.html.twig'
               
       );

    }
}
