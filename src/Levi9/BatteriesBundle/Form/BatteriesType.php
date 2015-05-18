<?php

namespace Levi9\BatteriesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BatteriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('count')
            ->add('name')
            // todo: Add buttons in the templates, not in the form classes or the controllers.
            ->add('save', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Levi9\BatteriesBundle\Entity\Batteries'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'levi9_batteriesbundle_batteries';
    }
}
