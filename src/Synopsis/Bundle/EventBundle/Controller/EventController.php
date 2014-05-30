<?php

namespace Synopsis\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Synopsis\Bundle\AttributeBundle\Entity\Value;
use Synopsis\Bundle\EventBundle\Entity\Event,
    Synopsis\Bundle\EventBundle\Form\EventType,
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction ( Subject $subject, SubjectAction $action )
    {
        $form = $this->createForm(new EventType(), new Event($subject, $action));

        return $this->render('SynopsisEventBundle:Event:new.html.twig', [
            'form' => $form->createView(),
        ]);
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
