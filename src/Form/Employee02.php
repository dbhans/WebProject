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

use App\Entity\Employees02;
use App\Entity\employee_type02;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class Employee02 extends AbstractType
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
            ->add('cellphone', TelType::class, [
                'label' => 'Cell Phone',
				'required' => false,
            ])
            ->add('san', IntegerType::class, [
                'label' => 'Social Insurance Number',
                'required' => false,
            ])
			->add('startdate', DateType::class, [
                'label' => 'Start Date',
                'required' => false,
            ])
			
			->add('birthday',  DateType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'Birthday',
				'required' => false,
            ])
          /*   ->add('type',  TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'First Name',
				'required' => false,
            ])
            ->add('task', TextType::class, [
				'attr' => ['autofocus' => true],
                'label' => 'Last Name',
				'required' => false,
            ])
            ->add('description',  TextareaType::class, [
                'attr' => ['autofocus' => true],
                'label' => 'label.sex',
				'required' => false,
            ])
            ->add('created', DateTimeType::class, [
                'label' => 'Created',
				'required' => false,
            ])*/
                
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
            'data_class' => Employees02::class, employee_type02::class,
        ]);
    }
}
