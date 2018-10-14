<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\UserType;
use App\Entity\UserControl;
use App\Entity\Adresses01;
use App\Entity\Employees01;
use App\Entity\Clients01;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Registration01Controller extends Controller
{
    /**
     * @Route("TeacherC01/register/{clientid}", name="registration_TCuser01")
     */
    public function registercli01Action(Request $request, UserPasswordEncoderInterface $passwordEncoder, $clientid)
    {
        // 1) build the form
        $user = new UserControl01();
        $clie = new Clients01();
        $Employees = new Employees01();
        $Adresses = new Adresses01();

        $em = $this->getDoctrine()->getManager();
        $clie = $em->getRepository(Clients01::class)->find($idClient);     
        $Adresses = $em->getRepository(Adresses01::class)->findOneBy(array('clientid'=>$idClient));
       
        $form = $this->createForm(UserType01::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $Employees->setFirstname($clie->getFirstname());
            $Employees->setLastname($clie->getLastname());
            $Employees->setSex($clie->getSex());
            $Employees->setCellphone($clie->getPhone());
            $Employees->setEmail($clie->getEmail());
            $Employees->setStartdate(new \date('now'));
            //$Employees->setCreatedbyid($this->getUser()->getId());


            $Adresses->setEmployeeid($idemployee);

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setClientid($clientid);
			$user->setRoles(['ROLE_TEACHER']);
			$user->setActive_user(1);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'The client have an access');
            return $this->redirectToRoute('Search_AllUser01');
        }

        return $this->render(
            'registration/register01.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("TeacherE01/register/{employeeid}", name="registration_TEuser01")
     */
    public function Registeremp01Action(Request $request, UserPasswordEncoderInterface $passwordEncoder, $employeeid)
    {
        // 1) build the form
        $user = new UserControl();
        $clientd = new clients01();
        $emplo = new Employees01();
        $Adresses = new Adresses01();
        $em = $this->getDoctrine()->getManager();
       
        $emplo = $em->getRepository(Employees01::class)->find($idemployee);
        $adres = $em->getRepository(Adresses01::class)->findOneBy(array('employeeid'=> $employeeid));  
        $form = $this->createForm(UserType::class, $user);

        $emplo = $em->getRepository(Employees01::class)->find($idemployee);
        $adres = $em->getRepository(Adresses01::class)->findOneBy(array('employeeid'=> $employeeid));  		
        
                $Client->setFirstname($emplo->getFirstname());
                $Client->setLastname($emplo->getLastname());
                $Client->setSex($emplo->getSex());
                $Client->setPhone($emplo->getCellphone());
                $Client->setEmail($emplo->getEmail());
                $Client->setEmployeeid($this->getUser());
                $Client->setCreatedbyid($this->getUser());
               
                $Compagny->setName('Matrix');
                $Compagny->setdescription('College');
                $em->persist($Client);
                $em->flush();
                $idClient =$Client->getId();
                $Compagny->setClientid($idClient); 
                $adres->setClientid($idClient);
             
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setEmployeeid($employeeid);
            $user->setClientid($idClient);
			$user->setRoles(['ROLE_TEACHER']);
			$user->setActive_user(1);
			
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'The client have an access');
            return $this->redirectToRoute('Search_AllUser01');
        }

        return $this->render(
            'registration/register01.html.twig',
            array('form' => $form->createView())
        );
    }
	/**
     * @Route("Client01/register/{clientid}", name="registration_client01")
     */
    public function Clientregister01Action(Request $request, UserPasswordEncoderInterface $passwordEncoder, $clientid)
    {
        // 1) build the form
        $user = new UserControl();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
			$user->setClientid($clientid);
			$user->setRoles(['ROLE_CLIENT']);
			$user->setActive_user(1);
			
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'The client have an access');
            return $this->redirectToRoute('Search_AllUser01');
        }

        return $this->render(
            'registration/register01.html.twig',
            array('form' => $form->createView())
        );
    }
		/**
     * @Route("Employee01/register/{employeeid}", name="registration_employee01")
     */
    public function Employeegister01Action(Request $request, UserPasswordEncoderInterface $passwordEncoder, $employeeid)
    {
        // 1) build the form
        $user = new UserControl();
        $form = $this->createFormBuilder()
		->add('username', TextType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
			->add('role', ChoiceType::class, array(
				'choices'  => array(
				'Employee' => "employee",
				'Supervisor' => "supervisor",
				),'label' => 'Role'
			))->getForm()
        ;

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $form["plainPassword"]["first"]->getData());
			$user->setPassword($password);
            $user->setUsername($form["username"]->getData());
			$user->setEmployeeid($employeeid);
			if($form["role"]->getData() == 'supervisor'){
                $user->setRoles(['ROLE_SUPERVISOR']);
            }
			else{
                $user->setRoles(['ROLE_EMPLOYEE']);
            }
			$user->setActive_user(1);
			
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'The client have an access');
            return $this->redirectToRoute('Search_AllUser01');
        }

        return $this->render(
            'registration/registeremployee01.html.twig',
            array('form' => $form->createView())
        );
    }
}