<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee02;
use App\Form\Employee02;
use App\Form\employee_types02;
use App\Form\Adress02;
use App\Entity\Employees02;
use App\Entity\Adresses02;
use App\Entity\employee_type02;
use App\Entity\UserControl;
use App\Entity\Clients02;
use App\Entity\meeting02;
use App\Entity\Messages02;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class Delete02Controller extends Controller
{
    /**
     * @Route("Delete02/Employee/{idemployee}", name="Delete_employee02")
     */
    public function DeleteEmployee02Action(Request $request,$idemployee)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Employees02::class)->find($idemployee);
            $user = $em->getRepository(UserControl02::class)->findOneBy(['employeeid'=>$idemployee]);
            $emplo->setStatus(0);  
            if($user) {
                    $user->setActive_user(0);
                $em->persist($user);
                } 
            
            $em->persist($emplo);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The employee has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllEmployee02');

    }
    
    /**
     * @Route("Delete02/Client/{idclient}", name="Delete_Client02")
     */
    public function DeleteClient02Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients02::class)->find($idclient);
            $user = $em->getRepository(UserControl02::class)->findOneBy(['clientid'=>$idclient]);
            $emplo->setStatus(0);  
            if($user) {
                $user->setActive_user(0);
                $em->persist($user);
            }
            $em->persist($emplo);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The client has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllClient02');

    }
    /**
     * @Route("Delete02/Sup/Client/{idclient}", name="Delete_Sup_Client02")
     */
    public function DeleteSupClient02Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients02::class)->find($idclient);
            $user = $em->getRepository(UserControl02::class)->findOneBy(['clientid'=>$idclient]);
            $emplo->setStatus(0);  
            if($user) {
                $user->setActive_user(0);
                $em->persist($user);
            }
            $em->persist($emplo);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The client has been successfully deleted');
        
            return $this->redirectToRoute('Search_Sup_AllClient02');

    }
    
    /**
     * @Route("Delete02/Message/client/{idmessage}", name="Delete_Client_Message02")
     */
    public function DeleteClientMessage02Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages02::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Send02');

    }
        
    /**
     * @Route("Delete02/Message/Employee/{idmessage}", name="Delete_Employee_Message02")
     */
    public function DeleteEmployeeMessage02Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages02::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Recieved02');

    }
    
        /**
     * @Route("Delete02/Meeting/{idmeeting}", name="Delete_Meeting02")
     */
    public function DeleteMeeting02Action(Request $request,$idmeeting)
    {
            $em = $this->getDoctrine()->getManager();          
            $meeting = $em->getRepository(meeting02::class)
            ->find($idmeeting);
            $em->remove($meeting);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllMeeting02');

    }
}
