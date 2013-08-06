<?php

namespace MDW\RosantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('cedula', null, array('max_length' => 10))
            ->add('fechaNacimiento', 'date', array('empty_value' => 
             array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día'),
             'format' => 'dd-MM-yyyy','years'=> range(date('Y') - 90, date('Y') -18)))
            ->add('sexo','choice', array('choices'=> array('m' => 'Masculino', 'f' => 'Femenino')))
            ->add('profesion','choice', array('choices'=> array
            ('i' => 'Ingeniero', 'a' => 'Abogado', 'ar' => 'Arquitecto','e' => 
            'Economista', 'd' => 'Doctor', 'l' => 'Licenciado', 'nn' => 
             'Sin Profesión')))
            ->add('empresa',null,array('required' => false))
            ->add('direccionEmpresa',null,array('required' => false))
            ->add('telefonoEmpresa',null,array('required' => false,'max_length' =>10))
            ->add('cargoEmpresa',null,array('required' => false))
            ->add('direccionDomicilio',null,array('required' => false))
            ->add('referenciaDireccion',null,array('required' => false))
            ->add('telefonoFijo',null,array('required' => false,'max_length' =>9))
            ->add('telefonoMovil',null,array('required' => false,'max_length' =>10))
            ->add('email','email')
            ->add('zona',null,array('required' => false))
            ->add('region',null,array('required' => false))
            ->add('tipo','choice', array('choices'=> array('Natural' => 'Natural', 'Juridica' => 'Jurídica')))
            ->add('referido',null,array('required' => false))
            ->add('agente','choice',array('required' => false,
             'choices'=> array('Elvira' => 'Elvira', 'Manuel' => 'Manuel')  ))
            ->add('contratante',null,array('required' => false))
            ->add('fechaRegistro', 'date', array('years' => range(date('Y')
            , date('Y')),'months'=> range(date('m')
            , date('m')),'days'=> range(date('d')
            , date('d'))   ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MDW\RosantBundle\Entity\Clientes'
        ));
    }

    public function getName()
    {
        return 'mdw_rosantbundle_clientestype';
    }
}
