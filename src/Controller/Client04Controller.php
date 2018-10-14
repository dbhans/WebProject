<?php

namespace App\Controller;

use App\Form\FullClient04;
use App\Form\Compagny04;
use App\Form\Document04;
use App\Form\Adress04;
use App\Form\Client04;
use App\Entity\Clients04;
use App\Entity\Documents04;
use App\Entity\Compagnies04;
use App\Entity\Adresses04;

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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Doctrine\ORM\EntityManagerInterface;

class Client04Controller extends Controller
{
    /**
     * @Route("New04/Client",name="Client_New04" )
     * 
     */
    public function NewClient04Action(Request $request)
    {
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                $Document = new Documents04();
		$Adress = new Adresses04();
                
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
            ->add('phone', IntegerType::class, [
                'label' => 'Cell Phone',
		'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Compagny Name',
		'required' => false,
            ])
            ->add('description', TextareaType::class, [
		'attr' => ['autofocus' => true],
                'label' => 'Compagny Description',
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
            
            $Client->setFirstname($form["firstname"]->getData());
            $Client->setLastname($form["lastname"]->getData());
            $Client->setSex($form["sex"]->getData());
            $Client->setPhone($form["phone"]->getData());
            $Client->setEmail($form["email"]->getData());
            $Client->setEmployeeid($this->getUser()->getEmployeeid());
            $Client->setCreatedbyid($this->getUser()->getEmployeeid());
            $Client->setStatus(1);

            $Compagny->setName($form["name"]->getData());
            $Compagny->setdescription($form["description"]->getData());
            
            $Adress->setCountry($form["country"]->getData());
            $Adress->setState($form["state"]->getData());
            $Adress->setCity($form["city"]->getData());
            $Adress->setAdress($form["adress"]->getData());
            $Adress->setZipcode($form["zipcode"]->getData());
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
            $em->flush();
            $idClient =$Client->getId();
            $Compagny->setClientid($idClient);
            $em->persist($Compagny);
            $em->flush(); 
            $Adress->setClientid($idClient);
            $em->persist($Adress);
            $em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'A new employee have been created');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Client/NewClient04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Superioir04/New/Client/{employeeid}",name="Client_Sup_New04" )
     * 
     */
    public function SupNewClient04Action(Request $request,$employeeid)
    {
		$Client = new Clients04();
		$Compagny = new Compagnies04();
                //$Document = new Documents04();
		$Adress = new Adresses04();
                
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
            ->add('phone', IntegerType::class, [
                'label' => 'Cell Phone',
		'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Compagny Name',
		'required' => false,
            ])
            ->add('description', TextareaType::class, [
		'attr' => ['autofocus' => true],
                'label' => 'Compagny Description',
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
            
            $Client->setFirstname($form["firstname"]->getData());
            $Client->setLastname($form["lastname"]->getData());
            $Client->setSex($form["sex"]->getData());
            $Client->setPhone($form["phone"]->getData());
            $Client->setEmail($form["email"]->getData());
            $Client->setEmployeeid($employeeid);
            $Client->setCreatedbyid($this->getUser()->getEmployeeid());
            $Client->setStatus(1);

            $Compagny->setName($form["name"]->getData());
            $Compagny->setdescription($form["description"]->getData());
            
            $Adress->setCountry($form["country"]->getData());
            $Adress->setState($form["state"]->getData());
            $Adress->setCity($form["city"]->getData());
            $Adress->setAdress($form["adress"]->getData());
            $Adress->setZipcode($form["zipcode"]->getData());
            
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
            $em->flush();
            $idClient =$Client->getId();
            $Compagny->setClientid($idClient);
            $em->persist($Compagny);
            $em->flush(); 
            $Adress->setClientid($idClient);
            $em->persist($Adress);
            $em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'A new client have been created');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Client/NewClient04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Superioir04/Multiple/New/ClientPersonalinfo/{employeeid}", name="Client_Sup_personalinfo04")
     * 
     */
    public function SupClientInfo04Action(Request $request,$employeeid)
    {
		$Client = new Clients04();		
		$form = $this->createForm(Client04::class,$Client);
      
                $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
            $Client->setEmployeeid($employeeid);
            $Client->setCreatedbyid($this->getUser()->getEmployeeid());
            $Client->setStatus(1);
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
            $em->flush();
            $idClient =$Client->getId();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
           // $this->addFlash('success', 'A new client have been created');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            return $this->redirectToRoute('Client_CompagnyClient04', ['idclient'=>$idClient]);
        }
		
        return $this->render('Client/Clientinfo04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Multiple04/New/ClientPersonalinfo", name="Client_personalinfo04")
     * 
     */
    public function ClientInfo04Action(Request $request)
    {
		$Client = new Clients04();		
		$form = $this->createForm(Client04::class,$Client);
      
                $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
            $Client->setEmployeeid($this->getUser()->getEmployeeid());
            $Client->setCreatedbyid($this->getUser()->getEmployeeid());
            $Client->setStatus(1);
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
             $em->flush();
           $idClient =$Client->getId();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            //$this->addFlash('success', 'A new client have been created');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            return $this->redirectToRoute('Employees_Adress04', ['idclient'=>$idClient]);
        }
		
        return $this->render('Client/Clientinfo04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Multiple04/New/CompagnyClient/{idclient}", name="Client_CompagnyClient04")
     */
    
    public function CompagnyClient04Action(Request $request,$idclient)
    {
		
		$Compagny = new Compagnies04();		
             $adress = new Adresses04();
             
		$form = $this->createFormBuilder()
            ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Compagny Name',
		        'required' => false,
            ])
            ->add('description', TextareaType::class, [
		        'attr' => ['autofocus' => true],
                'label' => 'Compagny Description',
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
		if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
                   
            
            $Compagny->setName($form["name"]->getData());
            $Compagny->setdescription($form["description"]->getData());
            
            $adress->setCountry($form["country"]->getData());
            $adress->setState($form["state"]->getData());
            $adress->setCity($form["city"]->getData());
            $adress->setAdress($form["adress"]->getData());
            $adress->setZipcode($form["zipcode"]->getData());
           
            $em = $this->getDoctrine()->getManager();
            
            //$em->persist($Client);
           //  $em->flush();
            $Compagny->setClientid($idclient);
            $em->persist($Compagny);
             //$em->flush(); 
            $adress->setClientid($idclient);
            $em->persist($adress);
            $em->flush();
            //$em->persist($Adress);
            //$em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'A new client have been created');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
           // return $this->redirectToRoute('Client_CompagnyAdress',['idclient'=>$idclient]);
        }
        return $this->render('Client/Clientcompagny04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
    /**
     * @Route("Multiple04/New/CompagnyAdress/{idclient}", name="Client_CompagnyAdress04")
     */
    public function CompagnyAdress04Action(Request $request,$idclient)
    {
		
		
                
                $adress = new Adresses04();
                
		$form = $this->createForm(Adress04::class);
         $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            $adress->setClientid($idclient);
            $em->persist($adress);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'You have create a new client');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Client/Clientadress04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
    /**
     * @Route("Multiple04/New/DocumentClient/{idclient}", name="Client_DocumentClient04")
     */
    public function DocumentClient04Action(Request $request,$idclient)
    {
		$Client = new Clients04();
                $Document = new Documents04();		
		$form = $this->createForm(Document04::class);
        //$form->handleRequest($request);
		
        return $this->render('Client/DocumentClient04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
    /**
     * @Route("Edit04/Client/{idClient}",name="Client_EditNew04" )
     * 
     */
    public function EditNewClient04Action(Request $request,$idClient)
    {
		$Client = new Clients04();
		$Compagny = new Compagnies04();
        //$Document = new Documents04();
		$Adress = new Adresses04();
               $em = $this->getDoctrine()->getManager();
               
               $clie = $em->getRepository(Clients04::class)->find($idClient);
                $comp = $em->getRepository(Compagnies04::class)->findOneBy(array('clientid'=>$idClient));      
               $adres = $em->getRepository(Adresses04::class)->findOneBy(array('clientid'=>$idClient));
               
               /*$reposity = $this->getDoctrine()->getRepository(Compagnies04::class);
                $query = $reposity->createQueryBuilder('p')
                        ->where('p.clientid == :clientid')
                        ->setParameter('clientid',$idClient)
                        ->getQuery()->f;
                $comp = $query->getResult();*/
                
                
                $tout = array(
                   'firstname'=>$clie->getFirstname(),
                   'lastname'=>$clie->getLastname(),
                   'sex'=>$clie->getSex(),
                   'phone'=>$clie->getPhone(),
                   'email'=>$clie->getEmail(),
                   'name'=>$comp->getName(),
                   'description'=>$comp->getDescription(),
                   'country'=>$adres->getCountry(),
                   'state'=>$adres->getState(),
                   'city'=>$adres->getCity(),
                   'adress'=>$adres->getAdress(),
                   'zipcode'=>$adres->getZipcode()
                    );
					
                
            $form = $this->createFormBuilder($tout)
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
            ->add('phone', IntegerType::class, [
                'label' => 'Cell Phone',
		'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
            ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Compagny Name',
		'required' => false,
            ])
            ->add('description', TextareaType::class, [
		'attr' => ['autofocus' => true],
                'label' => 'Compagny Description',
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
            ->add('save', SubmitType::class ,[
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
            
            $clie->setFirstname($form["firstname"]->getData());
            $clie->setLastname($form["lastname"]->getData());
            $clie->setSex($form["sex"]->getData());
            $clie->setPhone($form["phone"]->getData());
            $clie->setEmail($form["email"]->getData());
            $clie->setModifybyid($this->getUser()->getEmployeeid());
            $comp->setName($form["name"]->getData());
            $comp->setdescription($form["description"]->getData());
            
            $adres->setCountry($form["country"]->getData());
            $adres->setState($form["state"]->getData());
            $adres->setCity($form["city"]->getData());
            $adres->setAdress($form["adress"]->getData());
            $adres->setZipcode($form["zipcode"]->getData());
            
            
            
            $em->persist($clie);
            $em->flush();
            //$Compagny->setClientid($Client->getId());
            $em->persist($comp);
            $em->flush(); 
            //$Adress->setClientid($Compagny->getId());
            $em->persist($adres);
            $em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The client have been updated');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Client/EditClient04.html.twig', array(
           'form' => $form->createView(), 'idclient'=>$idClient
        ));

    }
    /**
     * @Route("Multiple04/Edit/ClientPersonalinfo/{idclient}", name="Client_editpersonalinfo04")
     * 
     */
    public function EditClientInfo04Action(Request $request,$idclient)
    {
		$Client = new Clients04();
                
                  $em = $this->getDoctrine()->getManager();
               $clie = $em->getRepository(Clients04::class)->find($idclient);
               
    
		$form = $this->createForm(Client04::class,$clie);
      
                $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($clie);
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
            return $this->redirectToRoute('Client_editCompagnyClient04', ['idclient'=>$clie->getId()]);
        }
		
        return $this->render('Client/Clientinfo04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Multiple04/Edit/CompagnyClient/{idclient}", name="Client_editCompagnyClient04")
     */
    public function EditCompagnyClient04Action(Request $request,$idclient)
    {
		//$Client = new Clients04();
		//$Compagny = new Compagnies04();		
               // $adress = new Adresses04();
                $em = $this->getDoctrine()->getManager();
                  $comp = $em->getRepository(Compagnies04::class)->findOneBy(array('clientid'=>$idclient));      
               $adres = $em->getRepository(Adresses04::class)->findOneBy(array('clientid'=>$idclient));
                             
                
                $tout = array(
      
                   'name'=>$comp->getName(),
                   'description'=>$comp->getDescription(),
                   'country'=>$adres->getCountry(),
                   'state'=>$adres->getState(),
                   'city'=>$adres->getCity(),
                   'adress'=>$adres->getAdress(),
                   'zipcode'=>$adres->getZipcode()
				   
                    );
                
		$form = $this->createFormBuilder($tout)
                        ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Compagny Name',
		'required' => false,
            ])
            ->add('description', TextareaType::class, [
		'attr' => ['autofocus' => true],
                'label' => 'Compagny Description',
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
		if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
           /*
            $Client->setFirstname($form["firstname"]->getData());
            $Client->setLastname($form["lastname"]->getData());
            $Client->setSex($form["sex"]->getData());
            $Client->setPhone($form["phone"]->getData());
            $Client->setEmail($form["email"]->getData());
            */
            $comp->setName($form["name"]->getData());
            $comp->setdescription($form["description"]->getData());
            
            $adres->setCountry($form["country"]->getData());
            $adres->setState($form["state"]->getData());
            $adres->setCity($form["city"]->getData());
            $adres->setAdress($form["adress"]->getData());
            $adres->setZipcode($form["zipcode"]->getData());
            
           // $em = $this->getDoctrine()->getManager();
            
            //$em->persist($Client);
            //$em->flush();
            //$idclient=$Client->getId();
            //$comp->setClientid($idclient);
            $em->persist($comp);
             $em->flush(); 
             //$adres->setClientid($idclient);
            $em->persist($adres);
            $em->flush();
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'The client have been updated');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('Client_EditCompagnyAdress04',['idCompagny'=>$Compagny->getId()]);
        }
        return $this->render('Client/EditClientcompagny04.html.twig', array(
           'form' => $form->createView(), 'idclient'=>$idclient
        ));

    }
    /**
     * @Route("Multiple04/Edit/CompagnyAdress/{idclient}", name="Client_EditCompagnyAdress04")
     */
    public function EditCompagnyAdress04Action(Request $request,$idclient)
    {
		
		
                
                //$adress = new Adresses();
                    $em = $this->getDoctrine()->getManager();          
                    $adres = $em->getRepository(Adresses04::class)->findOneBy(array('clientid'=>$idclient));
                             
                
                $tout = array(
                   'country'=>$adres->getCountry(),
                   'state'=>$adres->getState(),
                   'city'=>$adres->getCity(),
                   'adress'=>$adres->getAdress(),
                   'zipcode'=>$adres->getZipcode()
                    );
                
		$form = $this->createForm(Adress04::class,$adres);
         $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            //$em = $this->getDoctrine()->getManager();
            //$adress->setClientid($idCompagny);
            $em->persist($adres);
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
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Client/Clientadress04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
}
