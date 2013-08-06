<?php

namespace MDW\RosantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MensajesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('asunto')
            ->add('contenido')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MDW\RosantBundle\Entity\Mensajes'
        ));
    }

    public function getName()
    {
        return 'mdw_rosantbundle_mensajestype';
    }
}
