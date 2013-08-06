<?php

namespace MDW\RosantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PolizasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
       
            $builder
            ->add('numero')
            ->add('ramos')
            ->add('cliente')
            ->add('aseguradoras')//,'entity',array('class' => 'MDWRosantBundle:Aseguradoras',
           // 'property' => 'nombre',))
            ->add('agentes')
             ->add('marcas')
             ->add('modelo')       
            ->add('capitalAsegurado')
            ->add('fechaPago')
            ->add('vigenciaDesde')
            ->add('vigenciaHasta')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MDW\RosantBundle\Entity\Polizas'
        ));
    }

    public function getName()
    {
        return 'mdw_rosantbundle_polizastype';
    }
}
