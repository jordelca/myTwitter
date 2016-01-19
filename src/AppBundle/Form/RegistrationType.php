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
        $builder->add('user', new UserType());
        $builder->add('terms','checkbox',
            array('property_path' => 'termsAccepted', 'label' => 'I accept terms and conditions')
        );
        $builder->add('register', 'submit');
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'registration';
    }
}
