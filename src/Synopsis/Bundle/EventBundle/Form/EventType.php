<?php

namespace Synopsis\Bundle\EventBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Synopsis\Bundle\AttributeBundle\Entity\Value,
    Synopsis\Bundle\AttributeBundle\Form\ValueType;

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
        /**
         * @var $event   \Synopsis\Bundle\EventBundle\Entity\Event
         * @var $action  \Synopsis\Bundle\SubjectBundle\Entity\SubjectAction
         * @var $subject \Synopsis\Bundle\SubjectBundle\Entity\Subject
         */
        $event   = $options['data'];
        $action  = $options['action'];
        $subject = $options['subject'];

        // NOTE: This does not belong here!
        $event->setAction($action);
        $event->setSubject($subject);
        foreach ( $event->getAction()->getAttributes() as $attribute ) {
            $event->addAttributeValue($attribute, new Value());
        }

        $builder
            ->add('user')
            ->add('subject')
            ->add('action')
            ->add('attributeValues', 'collection', [
                'allow_add'      => false,
                'allow_delete'   => false,
                'label'          => 'Attribute Values',
                'type'           => new ValueType(),
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
            ->setRequired([
                'subject', 'action',
            ])
            ->setAllowedTypes([
                'subject' => 'Synopsis\Bundle\SubjectBundle\Model\SubjectInterface',
                'action'  => 'Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface',
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
