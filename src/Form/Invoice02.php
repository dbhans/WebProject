<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Form;

use App\Entity\Employees02;
use App\Entity\employee_type02;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class Invoice02 extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // For the full reference of options defined by each form field type
        // see https://symfony.com/doc/current/reference/forms/types.html

        // By default, form fields include the 'required' attribute, which enables
        // the client-side form validation. This means that you can't test the
        // server-side validation errors from the browser. To temporarily disable
        // this validation, set the 'required' attribute to 'false':
        // $builder->add('title', null, ['required' => false, ...]);

        $builder
            ->add('$clientid',  HiddenType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Client Id',
				'required' => false,
            ])
            ->add('$employeeid', HiddenType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Employee Id',
				'required' => false,
            ])
            ->add('productid',  HiddenType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Product Id',
				'required' => false,
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantity',
				'required' => false,
            ])
            ->add('discount', IntegerType::class, [
                'label' => 'Discount',
                'required' => false,
            ])   
			->add('save', SubmitType::class,[
                'label' => 'Send',
				'attr' => ['class' => "btn btn-lg btn-primary bottum"],
            ])           
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invoices02::class, 
        ]);
    }
}