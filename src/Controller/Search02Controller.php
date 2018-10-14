<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Entity\UserControl;
use App\Entity\Employees02;
use App\Entity\Invoices02;
use App\Entity\Products02;
use App\Entity\Clients02;
use App\Entity\meeting02;
use App\Entity\Messages02;
use App\Entity\Compagnies02;
use App\Entity\employee_type02;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Search02Controller extends Controller
{
    /**
     * @Route("Search02/AllClient", name="Search_AllClient02")
     */
    public function AllClient02Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients02::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies02::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search02/AllmultiClient", name="Search_AllmultiClient02")
     */
    public function AllmultiClient02Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients02::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies02::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    /**
     * @Route("Search02/Sup/AllClient", name="Search_Sup_AllClient02")
     */
    public function SupAllClient02Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients02::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies02::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search02/Sup/AllmultiClient", name="Search_Sup_AllmultiClient02")
     */
    public function SupAllmultiClient02Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients02::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies02::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    
    /**
     * @Route("Search02/All_multiple_Employee", name="Search_AllmultiEmployee02")
     */
    public function AllmultiEmployee02Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees02::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllmultEmployee02.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
       /**
     * @Route("Superior02/Search/All_multiple_Employee", name="Search_Sup_AllmultiEmployee02")
     */
    public function Sup_AllmultiEmployee02Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees02::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllmultiEmployee02.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
	/**
     * @Route("Search02/AllEmployee", name="Search_AllEmployee02")
     */
    public function AllEmployee02Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees02::class)
        ->findBy(['status' => 1]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllEmployee02.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Superior02/Search/AllEmployee", name="Search_Sup_AllEmployee02")
     */
    public function AllSupEmployee02Action()
    {
		
	$AllEmployee = $this->getDoctrine()
        ->getRepository(Employees02::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllEmployee02.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Search02/AllUser", name="Search_AllUser02")
     */
    public function AllUser02Action()
    {
		
	$AllUser = $this->getDoctrine()
        ->getRepository(UserControl02::class)
        ->findBy(['active_user' => 1]); 
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllUser02.html.twig', ['AllUser' =>$AllUser]);

    }
    /**
     * @Route("Search02/AllProduct", name="Search_AllProduct02")
     */
    public function AllProduct02Action()
    {
		
	$AllProduct = $this->getDoctrine()
        ->getRepository(Products02::class)
        ->findAll();
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllProduct02.html.twig', ['AllProduct' =>$AllProduct]);

    }

    /**
     * @Route("Search02/All_Recieved", name="Search_Recieved02")
     */
    public function AllMessageEmployee02Action()
    {
        $AllRecieved = $this->getDoctrine()
        ->getRepository(Messages02::class)
        ->findByEmployeeid($this->getUser()->getemployeeid());
        $AllClients = $this->getDoctrine()
        ->getRepository(Clients02::class)
        ->findAll();       

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllReceived02.html.twig', ['AllRecieved' =>$AllRecieved, 'AllClients' =>$AllClients]);


    }

    /**
     * @Route("Search02/All_Send", name="Search_Send02")
     */
    public function AllMessageClient02Action()
    {
		
	$AllSend = $this->getDoctrine()
        ->getRepository(Messages02::class)
        ->findByClientid($this->getUser()->getclientid());
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllSend02.html.twig', ['AllSend' =>$AllSend]);

    }

       /**
     * @Route("Search02/Client/Meeting", name="Search_NewClient02")
     */
    public function NewClientMeeting02Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients02::class)
      ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies02::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search02/Sup/Client/Meeting", name="Search_Sup_NewClient02")
     */
    public function SupNewClientMeeting02Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients02::class)
      ->findBy(['status' => 1]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies02::class)
      ->findAll();

        return $this->render('Search/AllclientMeeting02.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search02/AllMeeting", name="Search_AllMeeting02")
     */
    public function AllMeeting02Action()
    {
           
			
	$AllMeeting = $this->getDoctrine()
      ->getRepository(meeting02::class)
      ->findBy(['employeeid'=>$this->getUser()->getEmployeeid()]);
     

        return $this->render('Search/AllMeeting02.html.twig', ['AllMeeting' =>$AllMeeting]);

    }
}

