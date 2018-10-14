<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use App\Form\Invoice04;
use App\Form\Product04;
use App\Entity\Employees04;
use App\Entity\Invoices04;
use App\Entity\Products04;
use App\Entity\Clients04;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Product04Controller extends Controller
{
    /**
     * @Route("Product04", name="Product_New04")
     */
    public function NewProduct04Action()
    {
		
		$Employees = new Employees04();
                $Products = new Products04();
		$form = $this->createForm(Product04::class);
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
		
        return $this->render('Product/NewProduct04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("Client04/{number}/Product/sell", name="Product_sell04")
     */
    public function Productsell04Action()
    {
		$Employees = new Employees04();	
                $Invoices = new Invoices04();
                $Products = new Products04();
                $Clients = new Clients04();
		$form = $this->createForm(Invoice04::class);
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
		
        return $this->render('Product/Productsell04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/Product04/edit/{prod}", name="Product_edit04")
     */
    public function NewEmployee304Action()
    {
		
		$Employees = new Employees04();		
                $adress = new adress04();
		$form = $this->createForm(Adress04::class);
        //$form->handleRequest($request);
		
        return $this->render('Products/NewClient04.html.twig', array(
           'form' => $form->createView(),
        ));

    }
    
}

