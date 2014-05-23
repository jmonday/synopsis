<?php

namespace Synopsis\Bundle\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Synopsis\Bundle\EventBundle\Model\EventInterface;

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
            'events' => $this->getDoctrine()->getRepository('SynopsisEventBundle:Event')->findBy([], ['createdAt' => 'DESC']),
        ]);
    }

    /**
     * Event details
     *
     * @param EventInterface $event
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction ( EventInterface $event )
    {
        return $this->render('SynopsisEventBundle:Event:show.html.twig', [
            'event' => $event,
        ]);
    }

}
