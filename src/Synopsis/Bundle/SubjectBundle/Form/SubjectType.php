<?php

namespace Synopsis\Bundle\SubjectBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class SubjectType
 *
 * @package Synopsis\Bundle\SubjectBundle\Form
 */
class SubjectType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add('type', 'entity', [
                'class'       => 'SynopsisSubjectBundle:SubjectType',
                'property'    => 'namespace',
                'empty_value' => '-- Subject Type --',
            ])
            ->add('name')
            ->add('description')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver
            ->setDefaults([
                'data_class' => 'Synopsis\Bundle\SubjectBundle\Entity\Subject'
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName ()
    {
        return 'subject';
    }

}
