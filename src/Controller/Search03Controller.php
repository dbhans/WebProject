<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Entity\UserControl;
use App\Entity\Employees03;
use App\Entity\Invoices03;
use App\Entity\Products03;
use App\Entity\Clients03;
use App\Entity\meeting03;
use App\Entity\Messages03;
use App\Entity\Compagnies03;
use App\Entity\employee_type03;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Search03Controller extends Controller
{
    /**
     * @Route("Search03/AllClient", name="Search_AllClient03")
     */
    public function AllClient03Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies03::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search03/AllmultiClient", name="Search_AllmultiClient03")
     */
    public function AllmultiClient03Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies03::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    /**
     * @Route("Search03/Sup/AllClient", name="Search_Sup_AllClient03")
     */
    public function SupAllClient03Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies03::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search03/Sup/AllmultiClient", name="Search_Sup_AllmultiClient03")
     */
    public function SupAllmultiClient03Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies03::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    
    /**
     * @Route("Search03/All_multiple_Employee", name="Search_AllmultiEmployee03")
     */
    public function AllmultiEmployee03Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees03::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllmultEmployee03.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
       /**
     * @Route("Superior03/Search/All_multiple_Employee", name="Search_Sup_AllmultiEmployee03")
     */
    public function Sup_AllmultiEmployee03Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees03::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllmultiEmployee03.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
	/**
     * @Route("Search03/AllEmployee", name="Search_AllEmployee03")
     */
    public function AllEmployee03Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees03::class)
        ->findBy(['status' => 1]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllEmployee03.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Superior03/Search/AllEmployee", name="Search_Sup_AllEmployee03")
     */
    public function AllSupEmployee03Action()
    {
		
	$AllEmployee = $this->getDoctrine()
        ->getRepository(Employees03::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllEmployee03.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Search03/AllUser", name="Search_AllUser03")
     */
    public function AllUser03Action()
    {
		
	$AllUser = $this->getDoctrine()
        ->getRepository(UserControl03::class)
        ->findBy(['active_user' => 1]); 
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllUser03.html.twig', ['AllUser' =>$AllUser]);

    }
    /**
     * @Route("Search03/AllProduct", name="Search_AllProduct03")
     */
    public function AllProduct03Action()
    {
		
	$AllProduct = $this->getDoctrine()
        ->getRepository(Products03::class)
        ->findAll();
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllProduct03.html.twig', ['AllProduct' =>$AllProduct]);

    }

    /**
     * @Route("Search03/All_Recieved", name="Search_Recieved03")
     */
    public function AllMessageEmployee03Action()
    {
        $AllRecieved = $this->getDoctrine()
        ->getRepository(Messages03::class)
        ->findByEmployeeid($this->getUser()->getemployeeid());
        $AllClients = $this->getDoctrine()
        ->getRepository(Clients03::class)
        ->findAll();       

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllReceived03.html.twig', ['AllRecieved' =>$AllRecieved, 'AllClients' =>$AllClients]);


    }

    /**
     * @Route("Search03/All_Send", name="Search_Send03")
     */
    public function AllMessageClient03Action()
    {
		
	$AllSend = $this->getDoctrine()
        ->getRepository(Messages03::class)
        ->findByClientid($this->getUser()->getclientid());
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllSend03.html.twig', ['AllSend' =>$AllSend]);

    }

       /**
     * @Route("Search03/Client/Meeting", name="Search_NewClient03")
     */
    public function NewClientMeeting03Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients03::class)
      ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies03::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search03/Sup/Client/Meeting", name="Search_Sup_NewClient03")
     */
    public function SupNewClientMeeting03Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients03::class)
      ->findBy(['status' => 1]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies03::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting03.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search03/AllMeeting", name="Search_AllMeeting03")
     */
    public function AllMeeting03Action()
    {
           
			
	$AllMeeting = $this->getDoctrine()
      ->getRepository(meeting03::class)
      ->findBy(['employeeid'=>$this->getUser()->getEmployeeid()]);
     

        return $this->render('Search/AllMeeting03.html.twig', ['AllMeeting' =>$AllMeeting]);

    }
}

