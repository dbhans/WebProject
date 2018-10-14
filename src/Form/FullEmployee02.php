<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Form;

use App\Entity\employee_type02;
use App\Entity\Adresses02;
use App\Entity\Employees02;
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

class FullEmployee02 extends AbstractType
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
            ->add('cellphone', IntegerType::class, [
                'label' => 'Cell Phone',
				'required' => false,
            ])
            ->add('san', IntegerType::class, [
                'label' => 'SAN',
                'required' => false,
            ])
			->add('startdate', DateTimeType::class, [
                'label' => 'Start Date',
                'required' => false,
            ])
			->add('birthday',  DateTimeType::class, [
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
                'label' => 'label.state',
				'required' => false,
            ])
            ->add('city',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'City',
				'required' => false,
            ])
            ->add('adress', TextType::class, [
                'label' => 'label.Adress',
				'required' => false,
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Zipcode',
                'required' => false,
            ])
             ->add('type',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Type',
				'required' => false,
            ])
            ->add('task', TextType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Task',
				'required' => false,
            ])
            ->add('description',  TextareaType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Description',
				'required' => false,
            ])
            ->add('created', DateTimeType::class, [
                'label' => 'Created',
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
            'data_class' => Employees02::class, Adresses02::class, employee_type02::class,
        ]);
    }
}
