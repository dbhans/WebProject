<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;


use App\Entity\Employees02;
use App\Entity\Clients02;
use App\Entity\UserControl;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class User02Controller extends Controller
{
    /**
     * @Route("User02/Client", name="User_Client02")
     */
    public function AllUserClient02Action()
    {
        $em = $this->getDoctrine()->getManager();
        
	    $UserClient = $em->getRepository(Clients02::class)
        ->findAll();
        $query = $em->createQuery('SELECT c.clientid FROM App\Entity\UserControl c');
        $users = $query->getResult(); // array of ForumUser objects
        return $this->render('User/AllUserClient02.html.twig', ['UserClient' =>$UserClient, 'AllUser'=>$users]);

    }
    /**
     * @Route("User02/Employee", name="User_Employee02")
     */
    public function AllUserEmployee02Action()
    {
        $em = $this->getDoctrine()->getManager();
	    $UserEmployee = $em->getRepository(Employees02::class)
        ->findAll();

        $query = $em->createQuery('SELECT c.employeeid FROM App\Entity\UserControl c');
        $users = $query->getResult(); 

        return $this->render('User/AllUserEmployee02.html.twig', ['UserEmployee' =>$UserEmployee, 'AllUser'=>$users]);

    }
    /**
     * @Route("User02/Superior", name="User_Superior02")
     */
    public function NewEmployee302Action()
    {
		
		$Employees = new Employees02();		
                $adress = new adress02();
		$form = $this->createForm(Adress02::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient02.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

