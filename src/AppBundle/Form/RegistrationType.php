<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;




class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword','repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_name' => 'password',
                'second_name' => 'confirm',
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('terms','checkbox',
                        array('property_path' => 'termsAccepted', 'label' => 'I accept terms and conditions')
            )
            ->add('register', 'submit');
        ;
    }


    public function getParent()
    {
        // Or for Symfony < 2.8
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
