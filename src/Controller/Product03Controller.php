<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\Invoice03;
use App\Form\Product03;
use App\Entity\Employees03;
use App\Entity\Invoices03;
use App\Entity\Products03;
use App\Entity\Clients03;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Product03Controller extends Controller
{
    /**
     * @Route("Product03", name="Product_New03")
     */
    public function NewProduct03Action()
    {
		
		$Employees = new Employees03();
                $Products = new Products03();
		$form = $this->createForm(Product03::class);
          $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'post.created_successfully');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Product/NewProduct03.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Client03/{number}/Product/sell", name="Product_sell03")
     */
    public function Productsell03Action()
    {
		$Employees = new Employees03();	
                $Invoices = new Invoices03();
                $Products = new Products03();
                $Clients = new Clients03();
		$form = $this->createForm(Invoice03::class);
          $form->handleRequest($request);

        // the isSubmitted() method is completely optional because the other
        // isValid() method already checks whether the form is submitted.
        // However, we explicitly add it to improve code readability.
        // See https://symfony.com/doc/current/best_practices/forms.html#handling-form-submits
        if ($form->isSubmitted() && $form->isValid()) {
            //$post->setSlug($slugger->slugify($post->getTitle()));
            
          
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($Client);
             $em->flush();
           
           

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See https://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'post.created_successfully');

           /** if ($form->get('saveAndCreateNew')->isClicked()) {
             *   return $this->redirectToRoute('admin_post_new');
            *}
            */
            //return $this->redirectToRoute('admin_post_index');
        }
		
        return $this->render('Product/Productsell03.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/Product03/edit/{prod}", name="Product_edit03")
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

