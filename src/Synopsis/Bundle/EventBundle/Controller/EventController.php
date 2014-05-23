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
        /**
         * Obviously this code CANNOT live here!
         * This will be migrated to a final destination, perhaps an event listener (kernel.request)?
         * Lastly, the requires a user to be authenticated but has no checks to ensure a user is authenticated!
         */
        $em = $this->getDoctrine()->getManager();

        /* @var $filters \Doctrine\ORM\Query\FilterCollection */
        $filters = $em->getFilters();
        $filter = $filters->getFilter('ownable_entity');
        $filter->setParameter('user_id', $this->get('security.context')->getToken()->getUser()->getId());

        return $this->render('SynopsisEventBundle:Event:index.html.twig', [
            'events' => $this->get('synopsis.manager.event')->getCollectionOrdered(['createdAt' => 'DESC']),
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
