<?php

namespace Synopsis\Bundle\SubjectBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\SubjectBundle\Entity\SubjectActionRepository;

/**
 * Class SubjectActionParamConverter
 *
 * @package Synopsis\Bundle\SubjectBundle\Request
 */
class SubjectActionParamConverter implements ParamConverterInterface
{

    /**
     * @var SubjectActionRepository
     */
    protected $subjectActionRepository;

    /**
     * Simple constructor.
     *
     * @param SubjectActionRepository $subjectActionRepository
     */
    public function __construct ( SubjectActionRepository $subjectActionRepository )
    {
        $this->subjectActionRepository = $subjectActionRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function apply ( Request $request, ParamConverter $configuration )
    {
        $uuid   = $request->attributes->get('uuid');
        $action = $this->subjectActionRepository->getByUuid($uuid);
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