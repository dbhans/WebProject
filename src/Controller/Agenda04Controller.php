<?php

namespace App\Controller;

use App\Form\FullClient04;
use App\Form\Compagny04;
use App\Form\Document04;
use App\Form\Adress04;
use App\Form\Client04;
use App\Entity\Clients04;
use App\Entity\Documents04;
use App\Entity\Compagnies04;
use App\Entity\Adresses04;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Request;

class Agenda04Controller extends Controller
{
    /**
     * @Route("Agenda04/Week", name="Agenda_week04")
     * 
     */
    public function Week04Action()
    {
        /*
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$form = $this->createForm(FullClient04::class);
        $form->handleRequest($request);
		
        return $this->render('Client:NewClient04.html.twig', array(
           'form' => $form->createView(),
        ));
*/
    }
    
    /**
     * @Route("Meeting04/Agenda/Month/{idclient}", name="Agenda_meetingmonth04")
     * 
     */
    public function MeeetingMonth04Action($idclient)
    {
        /*
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$form = $this->createForm(FullClient04::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month04'));
        
        //return $this->redirectToRoute('Month04.html.twig');
        return $this->render('Agenda/MeeetingMonth04.html.twig',['idclient'=>$idclient] );

    }
    
       /**
     * @Route("Agenda04/Month", name="Agenda_month04")
     * 
     */
    public function Month04Action()
    {
        /*
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$form = $this->createForm(FullClient04::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month04'));
        
        //return $this->redirectToRoute('Month04.html.twig');
        return $this->render('Agenda/Month04.html.twig' );

    }
    
    /**
     * @Route("Agenda04/Essay", name="Agenda_esay04")
     * 
     */
    public function esaw04Action($idclient)
    {
        /*
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$form = $this->createForm(FullClient04::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month04'));
        
        //return $this->redirectToRoute('Month04.html.twig');
        return $this->render('Agenda/essaye04.html.twig',['idclient'=>$idclient]);

    }
    
    /**
     * @Route("Meeting04/Agenda/Day/{idclient}", name="Agenda_meetingday04")
     * 
     */
    public function Day04Action($idclient)
    {
        /*
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$form = $this->createForm(FullClient04::class);
        $form->handleRequest($request);
	*/	
        //return new RedirectResponse($this->generateUrl('Agenda_month04'));
        
        //return $this->redirectToRoute('Month04.html.twig');
        return $this->render('Agenda/Meetingday04.html.twig',['idclient'=>$idclient]
               
       );

    }
    /**
     * @Route("Agenda04/Day", name="Agenda_dayagenda04")
     * 
     */
    public function Dayagenda04Action()
    {
        
        return $this->render('Agenda/DayCalendar04.html.twig'
               
       );

    }
}
