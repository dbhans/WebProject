<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\Meetings;
use App\Form\Message;
use App\Entity\Employees;
use App\Entity\Adresses;
use App\Entity\Clients;
use App\Entity\Compagnies;
use App\Entity\meeting;
use App\Entity\Documents;
use App\Entity\Messages;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MeetingController extends Controller
{
    /**
     * @Route("Meeting/{client}", name="Meeting_New")
     */
    public function NewMeetingAction($client)
    {
           
		
        return $this->render('Agenda/Meetingday.html.twig', ['clientid'=>$client] );

    }
    
   

    /**
     * @Route("Meeting/{client}/{time}", name="Meeting_add")
     */
    public function AddMeetingAction(Request $request,$client,$time)
    {
           $clients = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->find($client);
               $meeting = new meeting();
               $meeting->getDatem(new \DateTime('now'));
               $meeting->setClientid($client);
               $meeting->settime($time);
               $meeting->setStatus('Open');
               $meeting->setEmployeeid($clients->getEmployeeid());
               $meeting->setClientname($clients->getFirstname().' '.$clients->getLastname());
	$form = $this->createForm(Meetings::class,$meeting);
                
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
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/NewMeeting.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
    

    /**
     * @Route("Superioir_Meeting/{client}/{time}", name="Meeting_Sup_add")
     */
    public function SupAddMeetingAction(Request $request,$client,$time)
    {
               $meeting = new meeting();
               $meeting->getDatem(new \DateTime);
               $meeting->setClientid($client);
               $meeting->settime($time);
              
	$form = $this->createForm(Meetings::class,$meeting);
                
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
		
        return $this->render('Meeting/NewMeeting.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
	
	
	 /**
     * @Route("Edit/Meeting/{Meetingid}", name="Meeting_edit")
     */
    public function EditMeetingAction(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting::class)->find($Meetingid);
					
               
              
	$form = $this->createForm(Meetings::class,$meeting);
                
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
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/EditMeeting.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
    
	 /**
     * @Route("Edit/Meeting/Close/{Meetingid}", name="Meeting_Close")
     */
    public function EditCloseMeetingAction(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting::class)->find($Meetingid);
					
               
              $meeting->setStatus('Close');
              $form = $this->createForm(Meetings::class,$meeting);
          
            
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
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }

     /**
     * @Route("Edit/Meeting/Pogress/{Meetingid}", name="Meeting_Progress")
     */
    public function EditProgressMeetingAction(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting::class)->find($Meetingid);
					
               
              $meeting->setStatus('In progress');
              $form = $this->createForm(Meetings::class,$meeting);
          
            
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
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
}

