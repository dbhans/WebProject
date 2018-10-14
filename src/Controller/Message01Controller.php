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

class Message01Controller extends Controller
{
   
    
    /**
     * @Route("Client01/Message", name="Message_Client01")
     */
    public function AddMessage01Action(Request $request)
    {
               $message = new Messages01();
               $message->setCreated(new \DateTime("now"));
               $message->setReaded(0);
			   
               $Client = $this->getDoctrine()
                ->getRepository(Clients01::class)
                ->find($this->getUser()->getClientid());
               
               $message->setClientid($this->getUser()->getClientid());
               $message->setEmployeeid($Client->getEmployeeid());
               
               $Employee = $this->getDoctrine()
                ->getRepository(Employees01::class)
                ->find($Client->getEmployeeid());               
              
	$form = $this->createForm(Message01::class,$message);
                
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
           // return $this->redirectToRoute('Employees_Adress01', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/Messageperso01.html.twig',['Employee'=>$Employee,'Client'=>$Client,'form' => $form->createView()] );

    }
	
    
    /**
     * @Route("Client01/Open/Message/{id}", name="Message_C_Open01")
     */
    public function COpenMessage01Action($id)
    {
		$em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages01::class)
                ->find($id);
               
               $Client = $em->getRepository(Clients01::class)
                ->find($Message->getClientid());
 
               
               $Employee = $em->getRepository(Employees01::class)
                ->find($Message->getEmployeeid());  
				
				
              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage01.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
    /**
     * @Route("Employee01/Open/Message/{id}", name="Message_E_Open01")
     */
    public function EOpenMessage01Action($id)
    {
		
        $em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages01::class)
                ->find($id);
               $Employee = $em->getRepository(Employees01::class)
                ->find($Message->getEmployeeid());  

               $Client = $em->getRepository(Clients01::class)
                ->find($Message->getClientid());
 
            
					$Message->setReaded(1);
					$em->persist($Message);
					$em->flush();

              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage01.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
}


