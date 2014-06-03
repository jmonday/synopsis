<?php

namespace Synopsis\Bundle\EventBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\Form\Form,
    Symfony\Component\Form\FormFactoryInterface,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Security\Core\SecurityContext;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException,
    Synopsis\Bundle\EventBundle\Entity\Event,
    Synopsis\Bundle\SubjectBundle\Entity\SubjectActionRepository,
    Synopsis\Bundle\SubjectBundle\Entity\SubjectRepository;
use Synopsis\Bundle\SubjectBundle\Exception\InvalidSubjectActionException;

/**
 * Class EventManager
 *
 * @package Synopsis\Bundle\EventBundle\Manager
 */
class EventManager
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
     * Create a new event.
     *
     * @param Request $request The request.
     * @throws \Synopsis\Bundle\SubjectBundle\Exception\InvalidSubjectActionException
     * @return EventInterface
     */
    public function post ( Request $request )
    {
        $action  = $this->entityManager->getRepository('SynopsisSubjectBundle:SubjectAction')->get($request->get('action'));
        $subject = $this->entityManager->getRepository('SynopsisSubjectBundle:Subject')->get($request->get('subject'));

        // Halt if we cannot take this action on this subject
        if ( false == $subject->getType()->getActions()->contains($action) ) {
            throw new InvalidSubjectActionException('An invalid action has been taken on this subject!');
        }

        $user  = $this->context->getToken()->getUser();
        $event = new Event($user, $subject, $action);

        // Create and process the event form
        $form  = $this->createForm($event, 'POST');
        $event = $this->processForm($form, $request, $event);

        return $event;
    }

    /**
     * Processes the form.
     *
     * @param Form $form The form to process.
     * @param Request $request The request.
     * @param EventInterface $event The event to process.
     * @throws InvalidFormException
     * @return EventInterface The processed event.
     */
    protected function processForm ( Form $form, Request $request, EventInterface $event )
    {
        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $this->entityManager->persist($event);
            $this->entityManager->flush($event);

            return $event;
        }

        throw new InvalidFormException('Invalid form submitted.', $form);
    }

    /**
     * Create a form.
     *
     * @param EventInterface $event
     * @param string $method The HTTP method.
     * @return Form
     */
    protected function createForm ( EventInterface $event, $method )
    {
        return $this->formFactory->create('event', $event, ['method' => $method]);
    }

}