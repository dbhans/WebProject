<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\FullEmployee;
use App\Form\Employee;
use App\Form\employee_types;
use App\Form\Adress;
use App\Entity\Employees;
use App\Entity\Adresses;
use App\Entity\employee_type;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class EmployeeController extends Controller
{
    /**
     * @Route("New/Employee", name="Employee_New")
     */
    public function NewEmployeeAction(Request $request)
    {
		//$employee_type = new employee_type();
		
		
        
                $form = $this->createFormBuilder()
            ->add('firstname',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'First Name',
				'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Last Name',
		'required' => false,
            ])
            ->add('sex',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Sex',
		'required' => false,
                
            ])
            ->add('startdate', DateType::class, [
                'label' => 'Start Date',
                'required' => false,
            ])
            ->add('san',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'San',
		        'required' => false,
                
            ])
            ->add('cellphone', IntegerType::class, [
                'label' => 'Cell Phone',
		        'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('birthday', DateType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Birthday',
		        'required' => false,
            ])
            ->add('country', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Country',
		        'required' => false,
            ])
            ->add('state', TextType::class, [
		        'attr' => ['autofocus' => true],
                'label' => 'State',
		        'required' => false,
            ])
            ->add('city',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'City',
		        'required' => false,
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adress',
		        'required' => false,
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Zipcode',
                'required' => false,
            ])
            ->add('save', SubmitType::class,[
                'label' => 'Send',
				'attr' => ['class' => "btn btn-lg btn-primary bottum"],
            ])
            ->getForm();

        $form->handleRequest($request);
        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            $Employees = new Employees();
                $Adresses = new Adresses();
                
            $Employees->setFirstname($form["firstname"]->getData());
            $Employees->setLastname($form["lastname"]->getData());
            $Employees->setSex($form["sex"]->getData());
            $Employees->setCellphone($form["cellphone"]->getData());
            $Employees->setEmail($form["email"]->getData());
            $Employees->setSan($form["san"]->getData());
            $Employees->setBirthday($form["birthday"]->getData());
            $Employees->setStartdate($form["startdate"]->getData());
            $Employees->setCreatedbyid($this->getUser()->getEmployeeid());
            $Employees->setStatus(1);

            $Adresses->setCountry($form["country"]->getData());
            $Adresses->setState($form["state"]->getData());
            $Adresses->setCity($form["city"]->getData());
            $Adresses->setAdress($form["adress"]->getData());
            $Adresses->setZipcode($form["zipcode"]->getData());
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Employees);
            $em->flush();
            
			$Adresses->setEmployeeid($Employees->getId());
            $em->persist($Adresses);
            $em->flush();
            

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'You have successfully enter a new employee');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->render('Succes/new/Employee_Succes.html.twig', array('Employee' => $Employees,));
        }
        
        return $this->render('Employee/NewEmployee.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Multiple/New/EmployeePersonalinfo", name="Employee_Personalinformation")
     */
    public function NewEmployee2Action(Request $request)
    {
		$Employees = new Employees();		
		$form = $this->createForm(Employee::class,$Employees);
       
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            $Employees->setCreatedbyid($this->getUser()->getEmployeeid());
          
            $em = $this->getDoctrine()->getManager();
             $Employees->setStatus(1);

            $em->persist($Employees);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'post.created_successfully');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Employee/Employeeinfo.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Multiple/New/EmployeesAdress/{idemployee}", name="Employees_Adress")
     */
    public function EmployeeadressAction(Request $request,$idemployee)
    {
		
           		
            $adress = new Adresses();
            $form = $this->createForm(Adress::class,$adress);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
            $adress->setEmployeeid($idemployee);
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($adress);
            $em->flush();
            

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'You have successfully enter a new employee');


        }
		
         return $this->render('Employee/Employeeadress.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Edit/Employee/{idemployee}", name="Employee_editNew")
     */
    public function EditEmployeeAction(Request $request, $idemployee)
    {
		//$employee_type = new employee_type();
		        $emplo = new Employees();
                $Adresses = new Adresses();
               $em = $this->getDoctrine()->getManager();
               
               $emplo = $em->getRepository(Employees::class)->find($idemployee);
                $adres = $em->getRepository(Adresses::class)->findOneBy(array('employeeid'=> $idemployee));  		
        
                $EditEmplo = array (
                   'firstname'=>$emplo->getFirstname(),
                   'lastname'=>$emplo->getLastname(),
                   'san'=>$emplo->getSan(),
                   'sex'=>$emplo->getSex(),
                   'cellphone'=>$emplo->getCellphone(),
                   'email'=>$emplo->getEmail(),
                   'birthday'=>$emplo->getBirthday(),
                   'startdate'=>$emplo->getStartdate(),
                   'country'=>$adres->getCountry(),
                   'state'=>$adres->getState(),
                   'city'=>$adres->getCity(),
                   'adress'=>$adres->getAdress(),
                   'zipcode'=>$adres->getZipcode()
				   
                );
                $form = $this->createFormBuilder($EditEmplo)
            ->add('firstname',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'First Name',
				'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Last Name',
		'required' => false,
            ])
            ->add('san',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'San',
		'required' => false,
                
            ])
            ->add('sex',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Sex',
		'required' => false,
                
            ])
            ->add('cellphone', IntegerType::class, [
                'label' => 'Cell Phone',
		'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('birthday', DateType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Birthday',
		'required' => false,
            ])
                        ->add('startdate', DateType::class, [
                'label' => 'Start Date',
                'required' => false,
            ])
            ->add('country', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Country',
		'required' => false,
            ])
            ->add('state', TextType::class, [
		'attr' => ['autofocus' => true],
                'label' => 'State',
		'required' => false,
            ])
            ->add('city',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'City',
		'required' => false,
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adress',
		'required' => false,
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Zipcode',
                'required' => false,
            ])
            ->add('save', SubmitType::class,[
                'label' => 'Update',
				'attr' => ['class' => "btn btn-lg btn-primary bottum"],
            ])
            ->getForm();

        $form->handleRequest($request);
        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
            $emplo->setFirstname($form["firstname"]->getData());
            $emplo->setLastname($form["lastname"]->getData());
            $emplo->setSex($form["sex"]->getData());
            $emplo->setCellphone($form["cellphone"]->getData());
            $emplo->setEmail($form["email"]->getData());
            $emplo->setSan($form["san"]->getData());
            $emplo->getBirthday($form["birthday"]->getData());
            $emplo->getBirthday($form["startdate"]->getData());
            
            $adres->setCountry($form["country"]->getData());
            $adres->setState($form["state"]->getData());
            $adres->setCity($form["city"]->getData());
            $adres->setAdress($form["adress"]->getData());
            $adres->setZipcode($form["zipcode"]->getData());
            
            
            
            $em->persist($emplo);
            $em->flush();
            
            //$Adresses->setEmployeeid($Employees->getId());
            $em->persist($adres);
            $em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The Employee have been successfully updated');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
        
        return $this->render('Employee/EditNewemployee.html.twig', array(
           'form' => $form->createView(),"employeeid"=>$idemployee
        ));

    }
    /**
     * @Route("Multiple/Edit/Employee_Personalinfo/{idemployee}", name="Employees_editPersonalinfo")
     */
    public function editPersonalinfo3Action(Request $request,$idemployee)
    {
		
		    $Employees = new Employees();		
               // $adress = new adress();
                   $em = $this->getDoctrine()->getManager();
               
               $emplo = $em->getRepository(Employees::class)->find($idemployee);
                 		
        
                /*$EditEmplo = array (
                   'firstname'=>$emplo->getFirstname(),
                   'lastname'=>$emplo->getLastname(),
                   'san'=>$emplo->getSex(),
                   'sex'=>$emplo->getSex(),
                   'cellphone'=>$emplo->getPhone(),
                   'email'=>$emplo->getEmail()
                );*/
               
		$form = $this->createForm(Employee::class,$emplo);
                $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            
            
            $em->persist($emplo);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'post.created_successfully');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           return $this->redirectToRoute('Employees_editAdress', ['idemployee'=>$emplo->getId()]);
        }
		
        return $this->render('Employee/EditEmployeeinfo.html.twig', array(
           'form' => $form->createView(),
        ));

    }

    /**
     * @Route("Multiple/Edit/EmployeesAdress/{idemployee}", name="Employees_editAdress")
     */
    public function NewEmployee3Action(Request $request,$idemployee)
    {
		
		
        $em = $this->getDoctrine()->getManager();
               
        $adres = $em->getRepository(Adresses::class)->findOneBy(['employeeid'=>$idemployee]);  		

        $form = $this->createForm(Adress::class,$adres);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($adres);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The Employee has been successfully updated');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Employees_Adress', ['idemployee'=>$Employees->getId()]);
        }
		
        return $this->render('Employee/EditEmployeeadress.html.twig', array('employeeid'=>$idemployee,
           'form' => $form->createView(),
        ));

    }
}
