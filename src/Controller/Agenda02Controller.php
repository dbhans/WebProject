<?php

namespace App\Controller;

use App\Form\FullClient02;
use App\Form\Compagny02;
use App\Form\Document02;
use App\Form\Adress02;
use App\Form\Client02;
use App\Entity\Clients02;
use App\Entity\Documents02;
use App\Entity\Compagnies02;
use App\Entity\Adresses02;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;

class Agenda02Controller extends Controller
{
    /**
     * @Route("Agenda02/Week", name="Agenda_week02")
     * 
     */
    public function Week02Action()
    {
        /*
		$Client = new Clients02();
		$Compagny = new Compagnies02();
                $Document = new Documents02();
		$form = $this->createForm(FullClient02::class);
        $form->handleRequest($request);
		
        return $this->render('Client:NewClient02.html.twig', array(
           'form' => $form->createView(),
        ));
*/
    }
    
    /**
     * @Route("Meeting02/Agenda/Month/{idclient}", name="Agenda_meetingmonth02")
     * 
     */
    public function MeeetingMonth02Action($idclient)
    {
        /*
		$Client = new Clients02();
		$Compagny = new Compagnies02();
                $Document = new Documents02();
		$form = $this->createForm(FullClient02::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month02'));
        
        //return $this->redirectToRoute('Month02.html.twig');
        return $this->render('Agenda/MeeetingMonth02.html.twig',['idclient'=>$idclient] );

    }
    
       /**
     * @Route("Agenda02/Month", name="Agenda_month02")
     * 
     */
    public function Month02Action()
    {
        /*
		$Client = new Clients02();
		$Compagny = new Compagnies02();
                $Document = new Documents02();
		$form = $this->createForm(FullClient02::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month02'));
        
        //return $this->redirectToRoute('Month02.html.twig');
        return $this->render('Agenda/Month02.html.twig' );

    }
    
    /**
     * @Route("Agenda02/Essay", name="Agenda_esay02")
     * 
     */
    public function esaw02Action($idclient)
    {
        /*
		$Client = new Clients02();
		$Compagny = new Compagnies02();
                $Document = new Documents02();
		$form = $this->createForm(FullClient02::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month02'));
        
        //return $this->redirectToRoute('Month02.html.twig');
        return $this->render('Agenda/essaye02.html.twig',['idclient'=>$idclient]);

    }
    
    /**
     * @Route("Meeting02/Agenda/Day/{idclient}", name="Agenda_meetingday02")
     * 
     */
    public function Day02Action($idclient)
    {
        /*
		$Client = new Clients02();
		$Compagny = new Compagnies02();
                $Document = new Documents02();
		$form = $this->createForm(FullClient02::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month02'));
        
        //return $this->redirectToRoute('Month02.html.twig');
        return $this->render('Agenda/Meetingday02.html.twig',['idclient'=>$idclient]
               
       );

    }
    /**
     * @Route("Agenda02/Day", name="Agenda_dayagenda02")
     * 
     */
    public function Dayagenda02Action()
    {
        
        return $this->render('Agenda/DayCalendar02.html.twig'
               
       );

    }
}
