<?php

namespace Synopsis\Bundle\SubjectBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\SubjectBundle\Model\SubjectActionManager;

/**
 * Class SubjectActionParamConverter
 *
 * @package Synopsis\Bundle\SubjectBundle\Request
 */
class SubjectActionParamConverter implements ParamConverterInterface
{

    /**
     * @var SubjectActionManager
     */
    protected $subjectActionManager;

    /**
     * Simple constructor.
     *
     * @param SubjectActionManager $subjectActionManager
     */
    public function __construct ( SubjectActionManager $subjectActionManager )
    {
        $this->subjectActionManager = $subjectActionManager;
    }

    /**
     * {@inheritdoc}
     */
    public function apply ( Request $request, ParamConverter $configuration )
    {
        $uuid   = $request->attributes->get('uuid');
        $action = $this->subjectActionManager->getByUuid($uuid);
        $param  = $configuration->getName();

        $request->attributes->set($param, $action);

        return ( ! is_null($action) );
    }

    /**
     * {@inheritdoc}
     */
    public function supports ( ParamConverter $configuration )
    {
        return ( in_array('Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface', class_implements($configuration->getClass())) );
    }

}