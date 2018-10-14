<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;


use App\Entity\Employees03;
use App\Entity\Clients03;
use App\Entity\UserControl;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class User03Controller extends Controller
{
    /**
     * @Route("User03/Client", name="User_Client03")
     */
    public function AllUserClient03Action()
    {
        $em = $this->getDoctrine()->getManager();
        
	    $UserClient = $em->getRepository(Clients03::class)
        ->findAll();
        $query = $em->createQuery('SELECT c.clientid FROM App\Entity\UserControl c');
        $users = $query->getResult(); // array of ForumUser objects
        return $this->render('User/AllUserClient03.html.twig', ['UserClient' =>$UserClient, 'AllUser'=>$users]);

    }
    /**
     * @Route("User03/Employee", name="User_Employee03")
     */
    public function AllUserEmployee03Action()
    {
        $em = $this->getDoctrine()->getManager();
	    $UserEmployee = $em->getRepository(Employees03::class)
        ->findAll();

        $query = $em->createQuery('SELECT c.employeeid FROM App\Entity\UserControl c');
        $users = $query->getResult(); 

        return $this->render('User/AllUserEmployee03.html.twig', ['UserEmployee' =>$UserEmployee, 'AllUser'=>$users]);

    }
    /**
     * @Route("User03/Superior", name="User_Superior03")
     */
    public function NewEmployee303Action()
    {
		
		$Employees = new Employees03();		
                $adress = new adress03();
		$form = $this->createForm(Adress03::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient03.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

