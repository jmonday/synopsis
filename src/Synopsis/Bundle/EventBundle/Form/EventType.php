<?php

namespace Synopsis\Bundle\EventBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Synopsis\Bundle\AttributeBundle\Form\ValueType;

/**
 * Class EventType
 *
 * @package Synopsis\Bundle\EventBundle\Form
 */
class EventType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add('user')
            ->add('subject')
            ->add('action')
            ->add('attributeValues', 'collection', [
                'allow_add'    => false,
                'allow_delete' => false,
                'label'        => 'Attribute Values',
                'type'         => new ValueType(),
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver
            ->setDefaults([
                'data_class' => 'Synopsis\Bundle\EventBundle\Entity\Event'
            ])
        ;
    }

    /**
     * {@inheritdoc
     */
    public function getName ()
    {
        return 'event';
    }

}
