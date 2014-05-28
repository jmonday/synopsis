<?php

namespace Synopsis\Bundle\AttributeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ValueType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('event')
            ->add('attribute')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Synopsis\Bundle\AttributeBundle\Entity\Value'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'synopsis_bundle_attributebundle_value';
    }
}
