<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;


use App\Entity\Employees;
use App\Entity\Clients;
use App\Entity\UserControl;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("User/Client", name="User_Client")
     */
    public function AllUserClientAction()
    {
        $em = $this->getDoctrine()->getManager();
        
	    $UserClient = $em->getRepository(Clients::class)
        ->findAll();
        $query = $em->createQuery('SELECT c.clientid FROM App\Entity\UserControl c');
        $users = $query->getResult(); // array of ForumUser objects
        return $this->render('User/AllUserClient.html.twig', ['UserClient' =>$UserClient, 'AllUser'=>$users]);

    }
    /**
     * @Route("User/Employee", name="User_Employee")
     */
    public function AllUserEmployeeAction()
    {
        $em = $this->getDoctrine()->getManager();
	    $UserEmployee = $em->getRepository(Employees::class)
        ->findAll();

        $query = $em->createQuery('SELECT c.employeeid FROM App\Entity\UserControl c');
        $users = $query->getResult(); 

        return $this->render('User/AllUserEmployee.html.twig', ['UserEmployee' =>$UserEmployee, 'AllUser'=>$users]);

    }
    /**
     * @Route("User/Superior", name="User_Superior")
     */
    public function NewEmployee3Action()
    {
		
		$Employees = new Employees();		
                $adress = new adress();
		$form = $this->createForm(Adress::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

