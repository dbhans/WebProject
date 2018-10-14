<?php

/* 
*
*/

// src/Controller/SecurityController.php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\UserControl;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

 
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
     /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in app/config/security.yml
     *
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        throw new \Exception('This should never be reached!');
    }

    /**
     * @Route("Employee/Change/{id}", name="security_change_pasword")
     */
    public function passwordChange(Request $request, UserPasswordEncoderInterface $passwordEncoder, $id)
    {
        
        $form = $this->createFormBuilder()       
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
			->getForm()
        ; 
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(UserControl::class)->find($id);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $form["plainPassword"]->getData());
            $user->setPassword($password);
            $em->flush();
            $this->addFlash('success', 'Password changed');
        }
        return $this->render('registration/UdatePassword.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("UserC/Change/Password", name="security_change_pasword_client")
     */
    public function userpasswordChange(UserPasswordEncoderInterface $passwordEncoder, Request $request)
    {
        
        $form = $this->createFormBuilder()
        
       
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
			->getForm()
        ;
        $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository(UserControl::class)->find($this->getUser()->getClientid());
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $form["plainPassword"]->getData());
            $user->setPassword($password);
            $em->flush();
            $this->addFlash('success', 'Password changed');
        }
        return $this->render('registration/UdatePassword.html.twig',array('form' => $form->createView()));
    }
    /**
     * @Route("UserE/Change/Password", name="security_change_pasword_employee")
     */
    public function userEpasswordChange(UserPasswordEncoderInterface $passwordEncoder, Request $request)
    {
        
        $form = $this->createFormBuilder()
        
       
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
			->getForm()
        ;
        $em = $this->getDoctrine()->getManager();
         $user = $em->getRepository(UserControl::class)->find($this->getUser()->getEmployeeid());
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $form["plainPassword"]->getData());
            $user->setPassword($password);
            $em->flush();
            $this->addFlash('success', 'Password changed');
        }
        return $this->render('registration/UdatePassword.html.twig',array('form' => $form->createView()));
    }
}