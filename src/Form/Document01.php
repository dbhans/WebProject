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

use App\Entity\Documents01;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
class Document01 extends AbstractType
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
                'label' => 'created',
				'required' => false,
            ])
			->add('modified', HiddenType::class, [
                'label' => 'Modified',
				'required' => false,
            ])
			->add('created', HiddenType::class, [
                'label' => 'Created',
				'required' => false,
            ])
			->add('clientid', HiddenType::class, [
                'label' => 'Clientid',
				'required' => false,
            ])
            ->add('employeeid', HiddenType::class, [
                'label' => 'Employeeid',
                'required' => false,
            ])
		    ->add('save', SubmitType::class,[
                'label' => 'Send',
				
            ]) 	
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Documents01::class,
        ]);
    }
}
