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

class Message03Controller extends Controller
{
   
    
    /**
     * @Route("Client03/Message", name="Message_Client03")
     */
    public function AddMessageg03Action(Request $request)
    {
               $message = new Messages03();
               $message->setCreated(new \DateTime("now"));
               $message->setReaded(0);
			   
               $Client = $this->getDoctrine()
                ->getRepository(Clients03::class)
                ->find($this->getUser()->getClientid());
               
               $message->setClientid($this->getUser()->getClientid());
               $message->setEmployeeid($Client->getEmployeeid());
               
               $Employee = $this->getDoctrine()
                ->getRepository(Employees03::class)
                ->find($Client->getEmployeeid());               
              
	$form = $this->createForm(Message03::class,$message);
                
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
           // return $this->redirectToRoute('Employees_Adress03', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/Messageperso03.html.twig',['Employee'=>$Employee,'Client'=>$Client,'form' => $form->createView()] );

    }
	
    
    /**
     * @Route("Client03/Open/Message/{id}", name="Message_C_Open03")
     */
    public function COpenMessage03Action($id)
    {
		$em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages03::class)
                ->find($id);
               
               $Client = $em->getRepository(Clients03::class)
                ->find($Message->getClientid());
 
               
               $Employee = $em->getRepository(Employees03::class)
                ->find($Message->getEmployeeid());  
				
				
              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage03.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
    /**
     * @Route("Employee03/Open/Message/{id}", name="Message_E_Open03")
     */
    public function EOpenMessage03Action($id)
    {
		
        $em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages03::class)
                ->find($id);
               $Employee = $em->getRepository(Employees03::class)
                ->find($Message->getEmployeeid());  

               $Client = $em->getRepository(Clients03::class)
                ->find($Message->getClientid());
 
            
					$Message->setReaded(1);
					$em->persist($Message);
					$em->flush();

              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage03.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
}


