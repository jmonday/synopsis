<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Form\Form,
    Symfony\Component\Form\FormFactoryInterface,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Security\Core\SecurityContext;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException,
    Synopsis\Bundle\SubjectBundle\Entity\Subject;

/**
 * Class SubjectManager
 *
 * @package Synopsis\Bundle\SubjectBundle\Manager
 */
class SubjectManager
{

    /**
     * @var SecurityContext
     */
    private $context;

    /**
     * @var ObjectManager
     */
    private $entityManager;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * Event manager constructor.
     *
     * @param ObjectManager $om
     * @param FormFactoryInterface $formFactory
     * @param SecurityContext $context
     */
    public function __construct ( ObjectManager $om, FormFactoryInterface $formFactory, SecurityContext $context )
    {
        $this->entityManager = $om;
        $this->formFactory = $formFactory;
        $this->context = $context;
    }

    /**
     * Create a new subject.
     *
     * @param Request $request The request.
     * @return SubjectInterface
     */
    public function post ( Request $request )
    {
        $subject = new Subject();
        $user    = $this->context->getToken()->getUser();
        $subject->setUser($user);

        // Create and process the subject form
        $form    = $this->createForm($subject, 'POST');
        $subject = $this->processForm($form, $request, $subject);

        return $subject;
    }

    /**
     * Processes the form.
     *
     * @param Form $form The form to process.
     * @param Request $request The request.
     * @param SubjectInterface $subject The subject to process.
     * @throws InvalidFormException
     * @return SubjectInterface The processed subject.
     */
    protected function processForm ( Form $form, Request $request, SubjectInterface $subject )
    {
        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $this->entityManager->persist($subject);
            $this->entityManager->flush($subject);

            return $subject;
        }

        throw new InvalidFormException('Invalid form submitted.', $form);
    }

    /**
     * Create a form.
     *
     * @param SubjectInterface $subject
     * @param string $method The HTTP method.
     * @return Form
     */
    protected function createForm ( SubjectInterface $subject, $method )
    {
        return $this->formFactory->create('subject', $subject, ['method' => $method]);
    }

}