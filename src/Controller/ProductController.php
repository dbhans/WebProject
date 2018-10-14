<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\Invoice;
use App\Form\Product;
use App\Entity\Employees;
use App\Entity\Invoices;
use App\Entity\Products;
use App\Entity\Clients;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("Product", name="Product_New")
     */
    public function NewProductAction()
    {
		
		$Employees = new Employees();
                $Products = new Products();
		$form = $this->createForm(Product::class);
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
		
        return $this->render('Product/NewProduct.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Client/{number}/Product/sell", name="Product_sell")
     */
    public function ProductsellAction()
    {
		$Employees = new Employees();	
                $Invoices = new Invoices();
                $Products = new Products();
                $Clients = new Clients();
		$form = $this->createForm(Invoice::class);
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
		
        return $this->render('Product/Productsell.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/Product/edit/{prod}", name="Product_edit")
     */
    public function NewEmployee3Action()
    {
		
		$Employees = new Employees();		
                $adress = new adress();
		$form = $this->createForm(Adress::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

