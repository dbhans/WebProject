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

class MessageController extends Controller
{
   
    
    /**
     * @Route("Client/Message", name="Message_Client")
     */
    public function AddMessagegAction(Request $request)
    {
               $message = new Messages();
               $message->setCreated(new \DateTime("now"));
               $message->setReaded(0);
			   
               $Client = $this->getDoctrine()
                ->getRepository(Clients::class)
                ->find($this->getUser()->getClientid());
               
               $message->setClientid($this->getUser()->getClientid());
               $message->setEmployeeid($Client->getEmployeeid());
               
               $Employee = $this->getDoctrine()
                ->getRepository(Employees::class)
                ->find($Client->getEmployeeid());               
              
	$form = $this->createForm(Message::class,$message);
                
        $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($message);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'Your Message have been send');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/Messageperso.html.twig',['Employee'=>$Employee,'Client'=>$Client,'form' => $form->createView()] );

    }
	
    
    /**
     * @Route("Client/Open/Message/{id}", name="Message_C_Open")
     */
    public function COpenMessageAction($id)
    {
		$em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages::class)
                ->find($id);
               
               $Client = $em->getRepository(Clients::class)
                ->find($Message->getClientid());
 
               
               $Employee = $em->getRepository(Employees::class)
                ->find($Message->getEmployeeid());  
				
				
              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
    /**
     * @Route("Employee/Open/Message/{id}", name="Message_E_Open")
     */
    public function EOpenMessageAction($id)
    {
		
        $em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages::class)
                ->find($id);
               $Employee = $em->getRepository(Employees::class)
                ->find($Message->getEmployeeid());  

               $Client = $em->getRepository(Clients::class)
                ->find($Message->getClientid());
 
            
					$Message->setReaded(1);
					$em->persist($Message);
					$em->flush();

              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
}


