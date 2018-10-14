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


use App\Entity\meeting02;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
class Meetings02 extends AbstractType
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
            ->add('clientname', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Client Name',
				'required' => false,
            ])
            ->add('employeeid', HiddenType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Employee Id',
				'required' => false,
            ])
            ->add('documentid', HiddenType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Document Id',
				'required' => false,
            ])
            ->add('status',  TextType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Status',
				'required' => false,
            ])
            ->add('created', HiddenType::class, [
                'label' => 'Created',
				'required' => false,
            ])
            ->add('datem', DateType::class, [
                'label' => 'Date',
				'required' => false,
            ])
            ->add('information', TextareaType::class, [
                'label' => 'Information',
				'required' => false,
            ])
            ->add('note', TextareaType::class, [
                'label' => 'Comment',
				'required' => false,
            ])
           ->add('time', IntegerType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'Time',
				'required' => false,
            ])  ;
			
        
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => meeting02::class, 
        ]);
    }
}
