<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\Invoice01;
use App\Form\Product01;
use App\Entity\Employees01;
use App\Entity\Invoices01;
use App\Entity\Products01;
use App\Entity\Clients01;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Product01Controller extends Controller
{
    /**
     * @Route("Product01", name="Product_New01")
     */
    public function NewProduct01Action()
    {
		
		$Employees = new Employees01();
                $Products = new Products01();
		$form = $this->createForm(Product01::class);
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
		
        return $this->render('Product/NewProduct01.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Client01/{number}/Product/sell", name="Product_sell01")
     */
    public function Productsell01Action()
    {
		$Employees = new Employees01();	
                $Invoices = new Invoices01();
                $Products = new Products01();
                $Clients = new Clients01();
		$form = $this->createForm(Invoice01::class);
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
		
        return $this->render('Product/Productsell01.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/Product01/edit/{prod}", name="Product_edit01")
     */
    public function Editproduct01Action()
    {
		
		$Employees = new Employees01();		
                $adress = new adress01();
		$form = $this->createForm(Adress01::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient01.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

