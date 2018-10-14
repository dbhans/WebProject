<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Form\Meetings02;
use App\Form\Message02;
use App\Entity\Employees02;
use App\Entity\Adresses02;
use App\Entity\Clients02;
use App\Entity\Compagnies02;
use App\Entity\meeting02;
use App\Entity\Documents02;
use App\Entity\Messages02;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Message02Controller extends Controller
{
   
    
    /**
     * @Route("Client02/Message", name="Message_Client02")
     */
    public function AddMessageg02Action(Request $request)
    {
               $message = new Messages02();
               $message->setCreated(new \DateTime("now"));
               $message->setReaded(0);
			   
               $Client = $this->getDoctrine()
                ->getRepository(Clients02::class)
                ->find($this->getUser()->getClientid());
               
               $message->setClientid($this->getUser()->getClientid());
               $message->setEmployeeid($Client->getEmployeeid());
               
               $Employee = $this->getDoctrine()
                ->getRepository(Employees02::class)
                ->find($Client->getEmployeeid());               
              
	$form = $this->createForm(Message02::class,$message);
                
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
           // return $this->redirectToRoute('Employees_Adress02', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/Messageperso02.html.twig',['Employee'=>$Employee,'Client'=>$Client,'form' => $form->createView()] );

    }
	
    
    /**
     * @Route("Client02/Open/Message/{id}", name="Message_C_Open02")
     */
    public function COpenMessage02Action($id)
    {
		$em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages02::class)
                ->find($id);
               
               $Client = $em->getRepository(Clients02::class)
                ->find($Message->getClientid());
 
               
               $Employee = $em->getRepository(Employees02::class)
                ->find($Message->getEmployeeid());  
				
				
              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage02.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
    /**
     * @Route("Employee02/Open/Message/{id}", name="Message_E_Open02")
     */
    public function EOpenMessage02Action($id)
    {
		
        $em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages02::class)
                ->find($id);
               $Employee = $em->getRepository(Employees02::class)
                ->find($Message->getEmployeeid());  

               $Client = $em->getRepository(Clients02::class)
                ->find($Message->getClientid());
 
            
					$Message->setReaded(1);
					$em->persist($Message);
					$em->flush();

              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage02.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
}


