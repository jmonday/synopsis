<?php

namespace Synopsis\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Synopsis\Bundle\EventBundle\Entity\Event,
    Synopsis\Bundle\SubjectBundle\Entity\Subject,
    Synopsis\Bundle\SubjectBundle\Entity\SubjectAction;

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
            'events' => $this->get('synopsis.manager.event')->getCollectionOrdered(['createdAt' => 'DESC']),
        ]);
    }

    /**
     * Create a new event.
     *
     * @param Subject $subject
     * @param SubjectAction $action
     */
    public function newAction ( Subject $subject, SubjectAction $action )
    {
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
