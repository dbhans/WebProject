<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee04;
use App\Form\Employee04;
use App\Form\employee_types04;
use App\Form\Adress04;
use App\Entity\Employees04;
use App\Entity\Adresses04;
use App\Entity\employee_type04;
use App\Entity\UserControl;
use App\Entity\Clients04;
use App\Entity\meeting04;
use App\Entity\Messages04;

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


class Delete04Controller extends Controller
{
    /**
     * @Route("Delete04/Employee/{idemployee}", name="Delete_employee04")
     */
    public function DeleteEmployee04Action(Request $request,$idemployee)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Employees04::class)->find($idemployee);
            $user = $em->getRepository(UserControl04::class)->findOneBy(['employeeid'=>$idemployee]);
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
        
            return $this->redirectToRoute('Search_AllEmployee04');

    }
    
    /**
     * @Route("Delete04/Client/{idclient}", name="Delete_Client04")
     */
    public function DeleteClient04Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients04::class)->find($idclient);
            $user = $em->getRepository(UserControl04::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_AllClient04');

    }
    /**
     * @Route("Delete04/Sup/Client/{idclient}", name="Delete_Sup_Client04")
     */
    public function DeleteSupClient04Action(Request $request,$idclient)
    {
            $em = $this->getDoctrine()->getManager();          
            $emplo = $em->getRepository(Clients04::class)->find($idclient);
            $user = $em->getRepository(UserControl04::class)->findOneBy(['clientid'=>$idclient]);
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
        
            return $this->redirectToRoute('Search_Sup_AllClient04');

    }
    
    /**
     * @Route("Delete04/Message/client/{idmessage}", name="Delete_Client_Message04")
     */
    public function DeleteClientMessage04Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages04::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Send04');

    }
        
    /**
     * @Route("Delete04/Message/Employee/{idmessage}", name="Delete_Employee_Message04")
     */
    public function DeleteEmployeeMessage04Action(Request $request,$idmessage)
    {
            $em = $this->getDoctrine()->getManager();          
            $Message = $em->getRepository(Messages04::class)
            ->find($idmessage);
            $em->remove($Message);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The message has been successfully deleted');
        
            return $this->redirectToRoute('Search_Recieved04');

    }
    
        /**
     * @Route("Delete04/Meeting/{idmeeting}", name="Delete_Meeting04")
     */
    public function DeleteMeeting04Action(Request $request,$idmeeting)
    {
            $em = $this->getDoctrine()->getManager();          
            $meeting = $em->getRepository(meeting04::class)
            ->find($idmeeting);
            $em->remove($meeting);
            $em->flush();
            
            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The meeting has been successfully deleted');
        
            return $this->redirectToRoute('Search_AllMeeting04');

    }
}
