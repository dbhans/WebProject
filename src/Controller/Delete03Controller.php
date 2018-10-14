<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee03;
use App\Form\Employee03;
use App\Form\employee_types03;
use App\Form\Adress03;
use App\Entity\Employees03;
use App\Entity\Adresses03;
use App\Entity\employee_type03;
use App\Entity\UserControl;
use App\Entity\Clients03;
use App\Entity\meeting03;
use App\Entity\Messages03;

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


class Delete03Controller extends Controller
{
    /**
     * @Route("Delete03/Employee/{idemployee}", name="Delete_employee03")
     */
    public function DeleteEmployee03Action(Request $request,$idemployee)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Employees03::class)->find($idemployee);
            $user = $em->getRepository(UserControl03::class)->findOneBy(['employeeid'=>$idemployee]);
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
        
            return $this->redirectToRoute('Search_AllEmployee03');

    }
    
    /**
     * @Route("Delete03/Client/{idclient}", name="Delete_Client03")
     */
    public function DeleteClient03Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients03::class)->find($idclient);
            $user = $em->getRepository(UserControl03::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_AllClient03');

    }
    /**
     * @Route("Delete03/Sup/Client/{idclient}", name="Delete_Sup_Client03")
     */
    public function DeleteSupClient03Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients03::class)->find($idclient);
            $user = $em->getRepository(UserControl03::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_Sup_AllClient03');

    }
    
    /**
     * @Route("Delete03/Message/client/{idmessage}", name="Delete_Client_Message03")
     */
    public function DeleteClientMessage03Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages03::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Send03');

    }
        
    /**
     * @Route("Delete03/Message/Employee/{idmessage}", name="Delete_Employee_Message03")
     */
    public function DeleteEmployeeMessage03Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages03::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Recieved03');

    }
    
        /**
     * @Route("Delete03/Meeting/{idmeeting}", name="Delete_Meeting03")
     */
    public function DeleteMeeting03Action(Request $request,$idmeeting)
    {
            $em = $this->getDoctrine()->getManager();          
            $meeting = $em->getRepository(meeting03::class)
            ->find($idmeeting);
            $em->remove($meeting);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllMeeting03');

    }
}
