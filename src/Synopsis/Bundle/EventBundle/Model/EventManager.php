<?php

namespace Synopsis\Bundle\EventBundle\Model;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Form\Form;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException,
    Synopsis\Bundle\CoreBundle\Model\AbstractManager;

/**
 * Class EventManager
 *
 * @package Synopsis\Bundle\EventBundle\Manager
 */
class EventManager extends AbstractManager
{

    /**
     * Create a new event.
     *
     * @param Request $request The request.
     * @return EventInterface
     */
    public function post ( Request $request )
    {
        /* @var $event \Synopsis\Bundle\EventBundle\Model\EventInterface */
        $action  = $this->container->get('synopsis.manager.subject.action')->getByUuid($request->get('action'));
        $subject = $this->container->get('synopsis.manager.subject')->getByUuid($request->get('subject'));
        $user    = $this->container->get('security.context')->getToken()->getUser();
        $event   = new $this->entityClass($user, $subject, $action);

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
    public function processForm ( Form $form, Request $request, EventInterface $event )
    {
        $form->handleRequest($request);

        if ( $form->isValid() ) {
            $this->om->persist($event);
            $this->om->flush($event);

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
    private function createForm ( EventInterface $event, $method )
    {
        return $this->formFactory->create('event', $event, ['method' => $method]);
    }

}