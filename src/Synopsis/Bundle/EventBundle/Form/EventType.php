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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * @var $action  \Synopsis\Bundle\SubjectBundle\Entity\SubjectAction
         * @var $subject \Synopsis\Bundle\SubjectBundle\Entity\Subject
         */
        $action  = $options['action'];
        $subject = $options['subject'];

        $builder
            ->add('user')
            ->add('subject', 'hidden', [
                'data' => $subject->getUuid(),
            ])
            ->add('action', 'hidden', [
                'data' => $action->getId(),
            ])
            ->add('attributeValues', 'collection', [
                'allow_add'      => true,
                'allow_delete'   => true,
                'label'          => 'Attribute Values',
                'type'           => new ValueType(),
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
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
    public function getName()
    {
        return 'event';
    }

}
