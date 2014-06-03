<?php

namespace Synopsis\Bundle\SubjectBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\SubjectBundle\Entity\SubjectRepository;

/**
 * Class SubjectParamConverter
 *
 * @package Synopsis\Bundle\SubjectBundle\Request
 */
class SubjectParamConverter implements ParamConverterInterface
{

    /**
     * @var SubjectRepository
     */
    protected $subjectRepository;

    /**
     * Simple constructor.
     *
     * @param SubjectRepository $subjectRepository
     */
    public function __construct ( SubjectRepository $subjectRepository )
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function apply ( Request $request, ParamConverter $configuration )
    {
        $uuid    = $request->attributes->get('uuid');
        $subject = $this->subjectRepository->getByUuid($uuid);
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