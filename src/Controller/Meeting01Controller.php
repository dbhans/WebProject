<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\Meetings01;
use App\Form\Message01;
use App\Entity\Employees01;
use App\Entity\Adresses01;
use App\Entity\Clients01;
use App\Entity\Compagnies01;
use App\Entity\meeting01;
use App\Entity\Documents01;
use App\Entity\Messages01;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Meeting01Controller extends Controller
{
    /**
     * @Route("Meeting01/{client}", name="Meeting_New01")
     */
    public function NewMeeting01Action($client)
    {
           
		
        return $this->render('Agenda/Meetingday01.html.twig', ['clientid'=>$client] );

    }
    
   

    /**
     * @Route("Meeting01/{client}/{time}", name="Meeting_add01")
     */
    public function AddMeeting01Action(Request $request,$client,$time)
    {
           $clients = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->find($client);
               $meeting = new meeting01();
               $meeting->getDatem(new \DateTime('now'));
               $meeting->setClientid($client);
               $meeting->settime($time);
               $meeting->setStatus('Open');
               $meeting->setEmployeeid($clients->getEmployeeid());
               $meeting->setClientname($clients->getFirstname().' '.$clients->getLastname());
	$form = $this->createForm(Meetings01::class,$meeting);
                
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
		
        return $this->render('Meeting/NewMeeting01.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
    

    /**
     * @Route("Superioir_Meeting01/{client}/{time}", name="Meeting_Sup_add01")
     */
    public function SupAddMeeting01Action(Request $request,$client,$time)
    {
               $meeting = new meeting01();
               $meeting->getDatem(new \DateTime);
               $meeting->setClientid($client);
               $meeting->settime($time);
              
	$form = $this->createForm(Meetings01::class,$meeting);
                
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
           // return $this->redirectToRoute('Employees_Adress01', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/NewMeeting01.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
	
	
	 /**
     * @Route("Edit01/Meeting/{Meetingid}", name="Meeting_edit01")
     */
    public function EditMeeting01Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting01::class)->find($Meetingid);
					
               
              
	$form = $this->createForm(Meetings01::class,$meeting);
                
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
           // return $this->redirectToRoute('Employees_Adress01', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/EditMeeting01.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
    
	 /**
     * @Route("Edit01/Meeting/Close/{Meetingid}", name="Meeting_Close01")
     */
    public function EditCloseMeeting01Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting01::class)->find($Meetingid);
					
               
              $meeting->setStatus('Close');
              $form = $this->createForm(Meetings01::class,$meeting);
          
            
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
        
		
        return $this->render('Meeting/EditMeeting.html01.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }

     /**
     * @Route("Edit01/Meeting/Pogress/{Meetingid}", name="Meeting_Progress01")
     */
    public function EditProgressMeeting01Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting01::class)->find($Meetingid);
					
               
              $meeting->setStatus('In progress');
              $form = $this->createForm(Meetings01::class,$meeting);
          
            
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
           // return $this->redirectToRoute('Employees_Adress01', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting01.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
}

