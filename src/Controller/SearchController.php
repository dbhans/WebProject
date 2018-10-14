<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Entity\UserControl;
use App\Entity\Employees;
use App\Entity\Invoices;
use App\Entity\Products;
use App\Entity\Clients;
use App\Entity\meeting;
use App\Entity\Messages;
use App\Entity\Compagnies;
use App\Entity\employee_type;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    /**
     * @Route("Search/AllClient", name="Search_AllClient")
     */
    public function AllClientAction()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search/AllmultiClient", name="Search_AllmultiClient")
     */
    public function AllmultiClientAction()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    /**
     * @Route("Search/Sup/AllClient", name="Search_Sup_AllClient")
     */
    public function SupAllClientAction()
    {
		
	$Allclient = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allclient.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
   
    /**
     * @Route("Search/Sup/AllmultiClient", name="Search_Sup_AllmultiClient")
     */
    public function SupAllmultiClientAction()
    {
		
	    $Allclient = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->findBy(['status' => 1]);
        $Allcompa = $this->getDoctrine()
        ->getRepository(Compagnies::class)
        ->findAll();

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Allmulticlient.html.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
    
    
    /**
     * @Route("Search/All_multiple_Employee", name="Search_AllmultiEmployee")
     */
    public function AllmultiEmployeeAction()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllmultEmployee.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
       /**
     * @Route("Superior/Search/All_multiple_Employee", name="Search_Sup_AllmultiEmployee")
     */
    public function Sup_AllmultiEmployeeAction()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllmultiEmployee.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
	/**
     * @Route("Search/AllEmployee", name="Search_AllEmployee")
     */
    public function AllEmployeeAction()
    {
		
	    $AllEmployee = $this->getDoctrine()
        ->getRepository(Employees::class)
        ->findBy(['status' => 1]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllEmployee.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Superior/Search/AllEmployee", name="Search_Sup_AllEmployee")
     */
    public function AllSupEmployeeAction()
    {
		
	$AllEmployee = $this->getDoctrine()
        ->getRepository(Employees::class)
        ->findBy(['status' => 1, 'createdbyid'=>$this->getUser()->getEmployeeid()]);
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/Sup_AllEmployee.html.twig', ['AllEmployee' =>$AllEmployee]);

    }
    /**
     * @Route("Search/AllUser", name="Search_AllUser")
     */
    public function AllUserAction()
    {
		
	$AllUser = $this->getDoctrine()
        ->getRepository(UserControl::class)
        ->findBy(['active_user' => 1]); 
        

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllUser.html.twig', ['AllUser' =>$AllUser]);

    }
    /**
     * @Route("Search/AllProduct", name="Search_AllProduct")
     */
    public function AllProductAction()
    {
		
	$AllProduct = $this->getDoctrine()
        ->getRepository(Products::class)
        ->findAll();
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllProduct.html.twig', ['AllProduct' =>$AllProduct]);

    }

    /**
     * @Route("Search/All_Recieved", name="Search_Recieved")
     */
    public function AllMessageEmployeeAction()
    {
        $AllRecieved = $this->getDoctrine()
        ->getRepository(Messages::class)
        ->findByEmployeeid($this->getUser()->getemployeeid());
        $AllClients = $this->getDoctrine()
        ->getRepository(Clients::class)
        ->findAll();       

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllReceived.html.twig', ['AllRecieved' =>$AllRecieved, 'AllClients' =>$AllClients]);


    }

    /**
     * @Route("Search/All_Send", name="Search_Send")
     */
    public function AllMessageClientAction()
    {
		
	$AllSend = $this->getDoctrine()
        ->getRepository(Messages::class)
        ->findByClientid($this->getUser()->getclientid());
                

              //  $results = $Allclient['firstname'];
        return $this->render('Search/AllSend.html.twig', ['AllSend' =>$AllSend]);

    }

       /**
     * @Route("Search/Client/Meeting", name="Search_NewClient")
     */
    public function NewClientMeetingAction()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients::class)
      ->findBy(['status' => 1, 'employeeid'=>$this->getUser()->getEmployeeid()]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies::class)
      ->findAll();

        return $this->render('Search/AllclientMeetinghtml.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search/Sup/Client/Meeting", name="Search_Sup_NewClient")
     */
    public function SupNewClientMeetingAction()
    {
           
			
	$Allclient = $this->getDoctrine()
      ->getRepository(Clients::class)
      ->findBy(['status' => 1]);
      $Allcompa = $this->getDoctrine()
      ->getRepository(Compagnies::class)
      ->findAll();

        return $this->render('Search/AllclientMeetinghtml.twig', ['Allclient' =>$Allclient, 'compag'=>$Allcompa]);

    }
       /**
     * @Route("Search/AllMeeting", name="Search_AllMeeting")
     */
    public function AllMeetingAction()
    {
           
			
	$AllMeeting = $this->getDoctrine()
      ->getRepository(meeting::class)
      ->findBy(['employeeid'=>$this->getUser()->getEmployeeid()]);
     

        return $this->render('Search/AllMeeting.html.twig', ['AllMeeting' =>$AllMeeting]);

    }
}

