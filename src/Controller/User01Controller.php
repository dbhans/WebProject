<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;


use App\Entity\Employees01;
use App\Entity\Clients01;
use App\Entity\UserControl01;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class User01Controller extends Controller
{
    /**
     * @Route("User01/Client", name="User_Client01")
     */
    public function AllUserClient01Action()
    {
        $em = $this->getDoctrine()->getManager();
        
	    $UserClient = $em->getRepository(Clients01::class)
        ->findAll();
        $query = $em->createQuery('SELECT c.clientid FROM App\Entity\UserControl c');
        $users = $query->getResult(); // array of ForumUser objects
        return $this->render('User/AllUserClient01.html.twig', ['UserClient' =>$UserClient, 'AllUser'=>$users]);

    }
    /**
     * @Route("User01/Employee", name="User_Employee01")
     */
    public function AllUserEmployee01Action()
    {
        $em = $this->getDoctrine()->getManager();
	    $UserEmployee = $em->getRepository(Employees01::class)
        ->findAll();

        $query = $em->createQuery('SELECT c.employeeid FROM App\Entity\UserControl01 c');
        $users = $query->getResult(); 

        return $this->render('User/AllUserEmployee01.html.twig', ['UserEmployee' =>$UserEmployee, 'AllUser'=>$users]);

    }
    /**
     * @Route("User01/Superior", name="User_Superior01")
     */
    public function NewEmployee3Action()
    {
		
		$Employees = new Employees01();		
                $adress = new adress01();
		$form = $this->createForm(Adress01::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient01.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

