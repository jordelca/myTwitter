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
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle','error_bubbling' => true))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle','error_bubbling' => true))
            ->add('plainPassword','repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_name' => 'password',
                'second_name' => 'confirm',
                'invalid_message' => 'fos_user.password.mismatch',
                'error_bubbling' => true
            ))
            ->add('terms','checkbox',
                        array('property_path' => 'termsAccepted', 'label' => 'I accept terms and conditions')
            )
            ->add('register', 'submit');
        ;
    }

    public function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User',
            'csrf_token_id' => 'registration',
            // BC for SF < 2.8
            'intention'  => 'registration',
        ));
    }
    // BC for SF < 2.7
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }
    // BC for SF < 3.0
    public function getName()
    {
        return $this->getBlockPrefix();
    }
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}
