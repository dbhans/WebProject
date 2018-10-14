<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form;

use App\Entity\Clients01;
use App\Entity\Compagnies01;
use App\Entity\Documents01;
use App\Entity\Adresses01;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Defines the form used to create and manipulate blog posts.
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 */
class FullClient01 extends AbstractType
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
            ->add('phone', TelType::class, [
                'label' => 'Phone',
				'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
            ])
			->add('compagnyid', HiddenType::class, [
                'label' => 'Compagnyid',
                'required' => false,
            ])
            ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Name',
				'required' => false,
            ])
            ->add('description', TextareaType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Description',
				'required' => false,
            ])
            ->add('created',  HiddenType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'City',
				'required' => false,
            ])
            ->add('modified', HiddenType::class, [
                'label' => 'Adress',
				'required' => false,
            ])
            ->add('clientid', HiddenType::class, [
                'label' => 'Zipcode',
                'required' => false,
            ])
                ->add('name', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Name',
				'required' => false,
            ])
            ->add('type', TextType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Type',
				'required' => false,
            ])
            ->add('sieze', TextType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Sieze',
				'required' => false,
            ])
            ->add('description',  TextareaType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Description',
				'required' => false,
            ])
            ->add('created', HiddenType::class, [
                'label' => 'Created',
				'required' => false,
            ])
			->add('modified', HiddenType::class, [
                'label' => 'Mdified',
				'required' => false,
            ])
			->add('created', HiddenType::class, [
                'label' => 'Created',
				'required' => false,
            ])
			->add('clientid', HiddenType::class, [
                'label' => 'Client Id',
				'required' => false,
            ])
            ->add('employeeid', HiddenType::class, [
                'label' => 'Employee Id',
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
        ;
        
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients01::class, Documents01::class, Compagnies01::class, Adresses01::class,
        ]);
    }
}
