<?php

namespace Synopsis\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;

use Synopsis\Bundle\CoreBundle\Exception\InvalidFormException,
    Synopsis\Bundle\EventBundle\Entity\Event;

/**
 * Class EventController
 *
 * @package Synopsis\Bundle\EventBundle\Controller
 */
class EventController extends Controller
{

    /**
     * Event listing
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction ()
    {
        return $this->render('SynopsisEventBundle:Event:index.html.twig', [
            'events' => $this->get('synopsis.repository.event')->getCollectionOrdered(['createdAt' => 'DESC']),
        ]);
    }

    /**
     * Create a new event.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction ( Request $request )
    {
        try {
            $event = $this->get('synopsis.manager.event')->post($request);
            return $this->redirect($this->generateUrl('event_show', ['id' => $event->getId()]));
        } catch ( InvalidFormException $exception ) {
            return $this->render('SynopsisEventBundle:Event:new.html.twig', [
                'form' => $exception->getForm()->createView(),
            ]);
        }
    }

    /**
     * Event details
     *
     * @param Event $event
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction ( Event $event )
    {
        return $this->render('SynopsisEventBundle:Event:show.html.twig', [
            'event' => $event,
        ]);
    }

}
