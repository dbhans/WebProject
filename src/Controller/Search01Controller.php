<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Entity\UserControl;
use App\Entity\Employees01;
use App\Entity\Invoices01;
use App\Entity\Products01;
use App\Entity\Clients01;
use App\Entity\meeting01;
use App\Entity\Messages01;
use App\Entity\Compagnies01;
use App\Entity\employee_type01;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Search01Controller extends Controller
{
    /**
     * @Route("Search01/AllClient", name="Search_AllClient01")
     */
    public function AllClient01Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies01::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient01.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search01/AllmultiClient", name="Search_AllmultiClient01")
     */
    public function AllmultiClient01Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies01::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient01.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    /**
     * @Route("Search01/Sup/AllClient", name="Search_Sup_AllClient01")
     */
    public function SupAllClient01Action()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies01::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient01.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search01/Sup/AllmultiClient", name="Search_Sup_AllmultiClient01")
     */
    public function SupAllmultiClient01Action()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies01::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient01.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    
    /**
     * @Route("Search01/All_multiple_Employee", name="Search_AllmultiEmployee01")
     */
    public function AllmultiEmployee01Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees01::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllmultEmployee01.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
       /**
     * @Route("Superior01/Search/All_multiple_Employee", name="Search_Sup_AllmultiEmployee01")
     */
    public function Sup_AllmultiEmployee01Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees01::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllmultiEmployee01.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
	/**
     * @Route("Search01/AllEmployee", name="Search_AllEmployee01")
     */
    public function AllEmployee01Action()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees01::class)
        ->findBy(['status' => 1]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient01.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Superior01/Search/AllEmployee", name="Search_Sup_AllEmployee01")
     */
    public function AllSupEmployeeAction()
    {
		
	/*$AllEmployee = $this->getDoctrine()
        ->getRepository(Employees01::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);*/
        
        $AllEmployee=[""];
              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllEmployee01.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Search01/AllUser", name="Search_AllUser01")
     */
    public function AllUser01Action()
    {
		
	$AllUser = $this->getDoctrine()
        ->getRepository(UserControl::class)
        ->findBy(['active_user' => 1]); 
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllUser01.html.twig', ['AllUser' =>$AllUser]);

    }
    /**
     * @Route("Search01/AllProduct", name="Search_AllProduct01")
     */
    public function AllProduct01Action()
    {
		
	$AllProduct = $this->getDoctrine()
        ->getRepository(Products01::class)
        ->findAll();
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllProduct01.html.twig', ['AllProduct' =>$AllProduct]);

    }

    /**
     * @Route("Search01/All_Recieved", name="Search_Recieved01")
     */
    public function AllMessageEmployee01Action()
    {
        $AllRecieved = $this->getDoctrine()
        ->getRepository(Messages01::class)
        ->findByEmployeeid($this->getUser()->getemployeeid());
        $AllClients = $this->getDoctrine()
        ->getRepository(Clients01::class)
        ->findAll();       

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllReceived01.html.twig', ['AllRecieved' =>$AllRecieved, 'AllClients' =>$AllClients]);


    }

    /**
     * @Route("Search01/All_Send", name="Search_Send01")
     */
    public function AllMessageClient01Action()
    {
		
	$AllSend = $this->getDoctrine()
        ->getRepository(Messages01::class)
        ->findByClientid($this->getUser()->getclientid());
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllSend01.html.twig', ['AllSend' =>$AllSend]);

    }

       /**
     * @Route("Search01/Client/Meeting", name="Search_NewClient01")
     */
    public function NewClientMeeting01Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients01::class)
      ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies01::class)
      ->findAll();

        return $this->render('Search/AllclientMeetinghtml01.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search01/Sup/Client/Meeting", name="Search_Sup_NewClient01")
     */
    public function SupNewClientMeeting01Action()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients01::class)
      ->findBy(['status' => 1]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies01::class)
      ->findAll();

        return $this->render('Search/AllclientMeetinghtml01.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search01/AllMeeting", name="Search_AllMeeting01")
     */
    public function AllMeeting01Action()
    {
           
			
	$AllMeeting = $this->getDoctrine()
      ->getRepository(meeting01::class)
      ->findBy(['employeeid'=>$this->getUser()->getEmployeeid()]);
     

        return $this->render('Search/AllMeeting01.html.twig', ['AllMeeting' =>$AllMeeting]);

    }
}

