<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;




class ChangeUserRoleType extends AbstractType
{
    protected $roles;
    public function __construct($roles)
    {
        $this->roles= $roles;

    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles','choice',
                array(
                    'choices' => $this->flattenArray($this->roles),
                    'multiple' => true,
                    'expanded' => true
                )
            )
            ->add('enabled','choice',
                array(
                    'choices' => array('1' => 'visible.active', '0' => 'visible.inactive'),
                    'expanded' => true
                )
            )
            ->add('submit','submit');
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'user_manager';
    }

    private function flattenArray(array $data)
    {
        $returnData = array();

        foreach($data as $key => $value)
        {

            $returnData[$key] = $key;
        }
        return $returnData;
    }
}
