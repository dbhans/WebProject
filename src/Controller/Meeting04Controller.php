<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\Meetings04;
use App\Form\Message04;
use App\Entity\Employees04;
use App\Entity\Adresses04;
use App\Entity\Clients04;
use App\Entity\Compagnies04;
use App\Entity\meeting04;
use App\Entity\Documents04;
use App\Entity\Messages04;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Meeting04Controller extends Controller
{
    /**
     * @Route("Meeting04/{client}", name="Meeting_New04")
     */
    public function NewMeeting04Action($client)
    {
           
		
        return $this->render('Agenda/Meetingday04.html.twig', ['clientid'=>$client] );

    }
    
   

    /**
     * @Route("Meeting04/{client}/{time}", name="Meeting_add04")
     */
    public function AddMeeting04Action(Request $request,$client,$time)
    {
           $clients = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->find($client);
               $meeting = new meeting04();
               $meeting->getDatem(new \DateTime('now'));
               $meeting->setClientid($client);
               $meeting->settime($time);
               $meeting->setStatus('Open');
               $meeting->setEmployeeid($clients->getEmployeeid());
               $meeting->setClientname($clients->getFirstname().' '.$clients->getLastname());
	$form = $this->createForm(Meetings04::class,$meeting);
                
        $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($meeting);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'You have added a new metting');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress04', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/NewMeeting04.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
    

    /**
     * @Route("Superioir_Meeting04/{client}/{time}", name="Meeting_Sup_add04")
     */
    public function SupAddMeeting04Action(Request $request,$client,$time)
    {
               $meeting = new meeting04();
               $meeting->getDatem(new \DateTime);
               $meeting->setClientid($client);
               $meeting->settime($time);
              
	$form = $this->createForm(Meetings04::class,$meeting);
                
        $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($meeting);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'post.created_successfully');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/NewMeeting04.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
	
	
	 /**
     * @Route("Edit04/Meeting/{Meetingid}", name="Meeting_edit04")
     */
    public function EditMeeting04Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting04::class)->find($Meetingid);
					
               
              
	$form = $this->createForm(Meetings04::class,$meeting);
                
        $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($meeting);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting is updated');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress04', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/EditMeeting04.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
    
	 /**
     * @Route("Edit04/Meeting/Close/{Meetingid}", name="Meeting_Close04")
     */
    public function EditCloseMeeting04Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting04::class)->find($Meetingid);
					
               
              $meeting->setStatus('Close');
              $form = $this->createForm(Meetings04::class,$meeting);
          
            
            $em->persist($meeting);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'This meeting is closed');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress04', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting04.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }

     /**
     * @Route("Edit04/Meeting/Pogress/{Meetingid}", name="Meeting_Progress04")
     */
    public function EditProgressMeeting04Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting04::class)->find($Meetingid);
					
               
              $meeting->setStatus('In progress');
              $form = $this->createForm(Meetings04::class,$meeting);
          
            
            $em->persist($meeting);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'This meeting is in progress');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress04', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting04.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
}

