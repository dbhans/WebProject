<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee;
use App\Form\Employee;
use App\Form\employee_types;
use App\Form\Adress;
use App\Entity\Employees;
use App\Entity\Adresses;
use App\Entity\employee_type;
use App\Entity\UserControl;
use App\Entity\Clients;
use App\Entity\meeting;
use App\Entity\Messages;

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


class DeleteController extends Controller
{
    /**
     * @Route("Delete/Employee/{idemployee}", name="Delete_employee")
     */
    public function DeleteEmployeeAction(Request $request,$idemployee)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Employees::class)->find($idemployee);
            $user = $em->getRepository(UserControl::class)->findOneBy(['employeeid'=>$idemployee]);
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
        
            return $this->redirectToRoute('Search_AllEmployee');

    }
    
    /**
     * @Route("Delete/Client/{idclient}", name="Delete_Client")
     */
    public function DeleteClientAction(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients::class)->find($idclient);
            $user = $em->getRepository(UserControl::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_AllClient');

    }
    /**
     * @Route("Delete/Sup/Client/{idclient}", name="Delete_Sup_Client")
     */
    public function DeleteSupClientAction(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients::class)->find($idclient);
            $user = $em->getRepository(UserControl::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_Sup_AllClient');

    }
    
    /**
     * @Route("Delete/Message/client/{idmessage}", name="Delete_Client_Message")
     */
    public function DeleteClientMessageAction(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Send');

    }
        
    /**
     * @Route("Delete/Message/Employee/{idmessage}", name="Delete_Employee_Message")
     */
    public function DeleteEmployeeMessageAction(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Recieved');

    }
    
        /**
     * @Route("Delete/Meeting/{idmeeting}", name="Delete_Meeting")
     */
    public function DeleteMeetingAction(Request $request,$idmeeting)
    {
            $em = $this->getDoctrine()->getManager();          
            $meeting = $em->getRepository(meeting::class)
            ->find($idmeeting);
            $em->remove($meeting);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllMeeting');

    }
}
