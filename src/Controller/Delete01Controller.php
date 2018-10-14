<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee01;
use App\Form\Employee01;
use App\Form\employee_types01;
use App\Form\Adress01;
use App\Entity\Employees01;
use App\Entity\Adresses01;
use App\Entity\employee_type01;
use App\Entity\UserControl01;
use App\Entity\Clients01;
use App\Entity\meeting01;
use App\Entity\Messages01;

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


class Delete01Controller extends Controller
{
    /**
     * @Route("Delete01/Employee/{idemployee}", name="Delete_employee01")
     */
    public function DeleteEmployee01Action(Request $request,$idemployee)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Employees01::class)->find($idemployee);
            $user = $em->getRepository(UserControl01::class)->findOneBy(['employeeid'=>$idemployee]);
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
        
            return $this->redirectToRoute('Search_AllEmployee01');

    }
    
    /**
     * @Route("Delete01/Client/{idclient}", name="Delete_Client01")
     */
    public function DeleteClient01Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients01::class)->find($idclient);
            $user = $em->getRepository(UserControl01::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_AllClient01');

    }
    /**
     * @Route("Delete01/Sup/Client/{idclient}", name="Delete_Sup_Client01")
     */
    public function DeleteSupClient01Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients01::class)->find($idclient);
            $user = $em->getRepository(UserControl01::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_Sup_AllClient01');

    }
    
    /**
     * @Route("Delete01/Message/client/{idmessage}", name="Delete_Client_Message01")
     */
    public function DeleteClientMessage01Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages01::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Send01');

    }
        
    /**
     * @Route("Delete01/Message/Employee/{idmessage}", name="Delete_Employee_Message01")
     */
    public function DeleteEmployeeMessage01Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages01::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Recieved01');

    }
    
        /**
     * @Route("Delete01/Meeting/{idmeeting}", name="Delete_Meeting01")
     */
    public function DeleteMeeting01Action(Request $request,$idmeeting)
    {
            $em = $this->getDoctrine()->getManager();          
            $meeting = $em->getRepository(meeting01::class)
            ->find($idmeeting);
            $em->remove($meeting);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllMeeting01');

    }
}
