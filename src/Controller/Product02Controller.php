<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\Invoice02;
use App\Form\Product02;
use App\Entity\Employees02;
use App\Entity\Invoices02;
use App\Entity\Products02;
use App\Entity\Clients02;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Product02Controller extends Controller
{
    /**
     * @Route("Product02", name="Product_New02")
     */
    public function NewProduct02Action()
    {
		
		$Employees = new Employees02();
                $Products = new Products02();
		$form = $this->createForm(Product02::class);
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
		
        return $this->render('Product/NewProduct02.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Client02/{number}/Product/sell", name="Product_sell02")
     */
    public function Productsell02Action()
    {
		$Employees = new Employees02();	
                $Invoices = new Invoices02();
                $Products = new Products02();
                $Clients = new Clients02();
		$form = $this->createForm(Invoice02::class);
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
		
        return $this->render('Product/Productsell02.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/Product02/edit/{prod}", name="Product_edit02")
     */
    public function NewEmployee302Action()
    {
		
		$Employees = new Employees02();		
                $adress = new adress02();
		$form = $this->createForm(Adress02::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient02.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

