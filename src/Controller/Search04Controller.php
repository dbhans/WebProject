<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Entity\UserControl;
use App\Entity\Employees04;
use App\Entity\Invoices04;
use App\Entity\Products04;
use App\Entity\Clients04;
use App\Entity\meeting04;
use App\Entity\Messages04;
use App\Entity\Compagnies04;
use App\Entity\employee_type04;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Search04Controller extends Controller
{
    /**
     * @Route("Search04/AllClient", name="Search_AllClient04")
     */
    public function AllClient04Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies04::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search04/AllmultiClient", name="Search_AllmultiClient04")
     */
    public function AllmultiClient04Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies04::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    /**
     * @Route("Search04/Sup/AllClient", name="Search_Sup_AllClient04")
     */
    public function SupAllClient04Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies04::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search04/Sup/AllmultiClient", name="Search_Sup_AllmultiClient04")
     */
    public function SupAllmultiClient04Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies04::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    
    /**
     * @Route("Search04/All_multiple_Employee", name="Search_AllmultiEmployee04")
     */
    public function AllmultiEmployee04Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees04::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllmultEmployee04.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
       /**
     * @Route("Superior04/Search/All_multiple_Employee", name="Search_Sup_AllmultiEmployee04")
     */
    public function Sup_AllmultiEmployee04Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees04::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllmultiEmployee04.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
	/**
     * @Route("Search04/AllEmployee", name="Search_AllEmployee04")
     */
    public function AllEmployee04Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees04::class)
        ->findBy(['status' => 1]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllEmployee04.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Superior04/Search/AllEmployee", name="Search_Sup_AllEmployee04")
     */
    public function AllSupEmployee04Action()
    {
		
	$AllEmployee = $this->getDoctrine()
        ->getRepository(Employees04::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllEmployee04.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Search04/AllUser", name="Search_AllUser04")
     */
    public function AllUser04Action()
    {
		
	$AllUser = $this->getDoctrine()
        ->getRepository(UserControl04::class)
        ->findBy(['active_user' => 1]); 
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllUser04.html.twig', ['AllUser' =>$AllUser]);

    }
    /**
     * @Route("Search04/AllProduct", name="Search_AllProduct04")
     */
    public function AllProduct04Action()
    {
		
	$AllProduct = $this->getDoctrine()
        ->getRepository(Products04::class)
        ->findAll();
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllProduct04.html.twig', ['AllProduct' =>$AllProduct]);

    }

    /**
     * @Route("Search04/All_Recieved", name="Search_Recieved04")
     */
    public function AllMessageEmployee04Action()
    {
        $AllRecieved = $this->getDoctrine()
        ->getRepository(Messages04::class)
        ->findByEmployeeid($this->getUser()->getemployeeid());
        $AllClients = $this->getDoctrine()
        ->getRepository(Clients04::class)
        ->findAll();       

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllReceived04.html.twig', ['AllRecieved' =>$AllRecieved, 'AllClients' =>$AllClients]);


    }

    /**
     * @Route("Search04/All_Send", name="Search_Send04")
     */
    public function AllMessageClient04Action()
    {
		
	$AllSend = $this->getDoctrine()
        ->getRepository(Messages04::class)
        ->findByClientid($this->getUser()->getclientid());
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllSend04.html.twig', ['AllSend' =>$AllSend]);

    }

       /**
     * @Route("Search04/Client/Meeting", name="Search_NewClient04")
     */
    public function NewClientMeeting04Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients04::class)
      ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies04::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search04/Sup/Client/Meeting", name="Search_Sup_NewClient04")
     */
    public function SupNewClientMeeting04Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients04::class)
      ->findBy(['status' => 1]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies04::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting04.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search04/AllMeeting", name="Search_AllMeeting04")
     */
    public function AllMeeting04Action()
    {
           
			
	$AllMeeting = $this->getDoctrine()
      ->getRepository(meeting04::class)
      ->findBy(['employeeid'=>$this->getUser()->getEmployeeid()]);
     

        return $this->render('Search/AllMeeting04.html.twig', ['AllMeeting' =>$AllMeeting]);

    }
}

