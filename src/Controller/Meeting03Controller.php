<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\Meetings03;
use App\Form\Message03;
use App\Entity\Employees03;
use App\Entity\Adresses03;
use App\Entity\Clients03;
use App\Entity\Compagnies03;
use App\Entity\meeting03;
use App\Entity\Documents03;
use App\Entity\Messages03;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Meeting03Controller extends Controller
{
    /**
     * @Route("Meeting03/{client}", name="Meeting_New03")
     */
    public function NewMeeting03Action($client)
    {
           
		
        return $this->render('Agenda/Meetingday03.html.twig', ['clientid'=>$client] );

    }
    
   

    /**
     * @Route("Meeting03/{client}/{time}", name="Meeting_add03")
     */
    public function AddMeeting03Action(Request $request,$client,$time)
    {
           $clients = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->find($client);
               $meeting = new meeting03();
               $meeting->getDatem(new \DateTime('now'));
               $meeting->setClientid($client);
               $meeting->settime($time);
               $meeting->setStatus('Open');
               $meeting->setEmployeeid($clients->getEmployeeid());
               $meeting->setClientname($clients->getFirstname().' '.$clients->getLastname());
	$form = $this->createForm(Meetings03::class,$meeting);
                
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
           // return $this->redirectToRoute('Employees_Adress03', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/NewMeeting03.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
    

    /**
     * @Route("Superioir_Meeting03/{client}/{time}", name="Meeting_Sup_add03")
     */
    public function SupAddMeeting03Action(Request $request,$client,$time)
    {
               $meeting = new meeting03();
               $meeting->getDatem(new \DateTime);
               $meeting->setClientid($client);
               $meeting->settime($time);
              
	$form = $this->createForm(Meetings03::class,$meeting);
                
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
		
        return $this->render('Meeting/NewMeeting03.html.twig', array(
           'form' => $form->createView(),
        ) );

    }
	
	
	 /**
     * @Route("Edit03/Meeting/{Meetingid}", name="Meeting_edit03")
     */
    public function EditMeeting03Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting03::class)->find($Meetingid);
					
               
              
	$form = $this->createForm(Meetings03::class,$meeting);
                
        $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            $meeting->setStatus('Close');
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
           // return $this->redirectToRoute('Employees_Adress03', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/EditMeeting03.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
    
	 /**
     * @Route("Edit03/Meeting/Close/{Meetingid}", name="Meeting_Close03")
     */
    public function EditCloseMeeting03Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting03::class)->find($Meetingid);
					
               
              $meeting->setStatus('Close');
              $form = $this->createForm(Meetings03::class,$meeting);
          
            
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
           // return $this->redirectToRoute('Employees_Adress03', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting03.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }

     /**
     * @Route("Edit03/Meeting/Pogress/{Meetingid}", name="Meeting_Progress03")
     */
    public function EditProgressMeeting03Action(Request $request,$Meetingid)
    {
			$em = $this->getDoctrine()->getManager();          
                $meeting = $em->getRepository(meeting03::class)->find($Meetingid);
					
               
              $meeting->setStatus('In progress');
              $form = $this->createForm(Meetings03::class,$meeting);
          
            
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
           // return $this->redirectToRoute('Employees_Adress03', ['idemployee'=>$Employees->getId()]);
        
		
        return $this->render('Meeting/EditMeeting03.html.twig', array('Meetingid'=>$Meetingid,
           'form' => $form->createView()
        ) );

    }
}

