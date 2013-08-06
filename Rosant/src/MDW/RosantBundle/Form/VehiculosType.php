<?php

namespace MDW\RosantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VehiculosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marcas')
             ->add('modelo')        
            ->add('year')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MDW\RosantBundle\Entity\Vehiculos'
        ));
    }

    public function getName()
    {
        return 'mdw_rosantbundle_vehiculostype';
    }
}
