<?php

namespace Synopsis\Bundle\SubjectBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\SubjectBundle\Model\SubjectManager;

/**
 * Class SubjectParamConverter
 *
 * @package Synopsis\Bundle\SubjectBundle\Request
 */
class SubjectParamConverter implements ParamConverterInterface
{

    /**
     * @var SubjectManager
     */
    protected $subjectManager;

    /**
     * Simple constructor.
     *
     * @param SubjectManager $subjectManager
     */
    public function __construct ( SubjectManager $subjectManager )
    {
        $this->subjectManager = $subjectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function apply ( Request $request, ParamConverter $configuration )
    {
        $uuid    = $request->attributes->get('uuid');
        $subject = $this->subjectManager->getByUuid($uuid);
        $param   = $configuration->getName();

        $request->attributes->set($param, $subject);

        return ( ! is_null($subject) );
    }

    /**
     * {@inheritdoc}
     */
    public function supports ( ParamConverter $configuration )
    {
        return ( in_array('Synopsis\Bundle\SubjectBundle\Model\SubjectInterface', class_implements($configuration->getClass())) );
    }

}