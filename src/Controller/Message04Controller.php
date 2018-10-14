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

class Message04Controller extends Controller
{
   
    
    /**
     * @Route("Client04/Message", name="Message_Client04")
     */
    public function AddMessageg04Action(Request $request)
    {
               $message = new Messages04();
               $message->setCreated(new \DateTime("now"));
               $message->setReaded(0);
			   
               $Client = $this->getDoctrine()
                ->getRepository(Clients04::class)
                ->find($this->getUser()->getClientid());
               
               $message->setClientid($this->getUser()->getClientid());
               $message->setEmployeeid($Client->getEmployeeid());
               
               $Employee = $this->getDoctrine()
                ->getRepository(Employees04::class)
                ->find($Client->getEmployeeid());               
              
	$form = $this->createForm(Message04::class,$message);
                
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
           // return $this->redirectToRoute('Employees_Adress04', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Meeting/Messageperso04.html.twig',['Employee'=>$Employee,'Client'=>$Client,'form' => $form->createView()] );

    }
	
    
    /**
     * @Route("Client04/Open/Message/{id}", name="Message_C_Open04")
     */
    public function COpenMessage04Action($id)
    {
		$em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages04::class)
                ->find($id);
               
               $Client = $em->getRepository(Clients04::class)
                ->find($Message->getClientid());
 
               
               $Employee = $em->getRepository(Employees04::class)
                ->find($Message->getEmployeeid());  
               $Client = $em->getRepository(Clients04::class);
               $Employee='';
               $Client='';
               $Message='';
              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage04.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
    /**
     * @Route("Employee04/Open/Message/{id}", name="Message_E_Open04")
     */
    public function EOpenMessage04Action($id)
    {
		
        $em = $this->getDoctrine()->getManager();
			   
               $Message = $em->getRepository(Messages04::class)
                ->find($id);
               $Employee = $em->getRepository(Employees04::class)
                ->find($Message->getEmployeeid());  

               $Client = $em->getRepository(Clients04::class)
                ->find($Message->getClientid());
 
            
					$Message->setReaded(1);
					$em->persist($Message);
					$em->flush();

              //  $results = $Allclient['firstname'];
        return $this->render('Meeting/ViewMessage04.html.twig', ['Employee'=>$Employee,'Client'=>$Client,'Message'=>$Message] );

    }
}


