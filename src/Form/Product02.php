<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Form;

use App\Entity\Employees02;
use App\Entity\employee_type02;
use App\Entity\Products02;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class Product02 extends AbstractType
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
            ->add('productname',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Product Name',
				'required' => false,
            ])
            ->add('descriptionname', TextType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Description',
				'required' => false,
            ])
            ->add('quantity',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Quantity',
				'required' => false,
            ])
            ->add('category', IntegerType::class, [
                'label' => 'Category',
				'required' => false,
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Price',
                'required' => false,
            ])
			->add('startdate', DateTimeType::class, [
                'label' => 'Start Date',
                'required' => false,
            ])
			->add('discount',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Discount',
				'required' => false,
            ])
			->add('productdate',  DateTimeType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Product Date',
				'required' => false,
            ])
             ->add('employeeid',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'First Name',
				'required' => false,
            ])->add('save', SubmitType::class,[
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
            'data_class' => Products02::class, 
        ]);
    }
}