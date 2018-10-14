<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;


use App\Entity\Employees04;
use App\Entity\Clients04;
use App\Entity\UserControl;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class User04Controller extends Controller
{
    /**
     * @Route("User04/Client", name="User_Client04")
     */
    public function AllUserClient04Action()
    {
        $em = $this->getDoctrine()->getManager();
        
	    $UserClient = $em->getRepository(Clients04::class)
        ->findAll();
        $query = $em->createQuery('SELECT c.clientid FROM App\Entity\UserControl c');
        $users = $query->getResult(); // array of ForumUser objects
        return $this->render('User/AllUserClient04.html.twig', ['UserClient' =>$UserClient, 'AllUser'=>$users]);

    }
    /**
     * @Route("User04/Employee", name="User_Employee04")
     */
    public function AllUserEmployee04Action()
    {
        $em = $this->getDoctrine()->getManager();
	    $UserEmployee = $em->getRepository(Employees04::class)
        ->findAll();

        $query = $em->createQuery('SELECT c.employeeid FROM App\Entity\UserControl c');
        $users = $query->getResult(); 

        return $this->render('User/AllUserEmployee04.html.twig', ['UserEmployee' =>$UserEmployee, 'AllUser'=>$users]);

    }
    /**
     * @Route("User04/Superior", name="User_Superior04")
     */
    public function NewEmployee304Action()
    {
		
		$Employees = new Employees04();		
                $adress = new adress04();
		$form = $this->createForm(Adress04::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

