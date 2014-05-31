<?php

namespace Synopsis\Bundle\AttributeBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Form\FormEvent,
    Symfony\Component\Form\FormEvents,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ValueType
 *
 * @package Synopsis\Bundle\AttributeBundle\Form
 */
class ValueType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        $builder->addEventListener ( FormEvents::PRE_SET_DATA, function ( FormEvent $event ) {
            /* @var \Synopsis\Bundle\AttributeBundle\Entity\Value $value */
            $form  = $event->getForm();
            $value = $event->getData();

            $form->add('value',
                $value->getAttribute()->getType(),
                $value->getAttribute()->getConfiguration()
            );
        });
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver
            ->setDefaults([
                'data_class' => 'Synopsis\Bundle\AttributeBundle\Entity\Value'
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName ()
    {
        return 'attribute_value';
    }

}
