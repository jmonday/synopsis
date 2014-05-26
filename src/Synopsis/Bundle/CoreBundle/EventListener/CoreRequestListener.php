<?php

namespace Synopsis\Bundle\CoreBundle\EventListener;

use Doctrine\ORM\EntityManager;

use Symfony\Component\HttpKernel\Event\GetResponseEvent,
    Symfony\Component\HttpKernel\HttpKernel,
    Symfony\Component\Security\Core\SecurityContext;

/**
 * Class CoreRequestListener
 *
 * @package Synopsis\Bundle\CoreBundle\EventListener
 */
class CoreRequestListener
{

    /**
     * Symfony security context.
     *
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    private $context;

    /**
     * Doctrine entity manager.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * Construct
     *
     * @param EntityManager $em The Doctrine entity manager.
     * @param SecurityContext $context The Symfony security context.
     */
    public function __construct ( EntityManager $em, SecurityContext $context )
    {
        $this->context = $context;
        $this->em = $em;
    }

    /**
     * Enable the ownable entity filter and set required parameters.
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest ( GetResponseEvent $event )
    {
        // Return if this is not the master request
        if ( HttpKernel::MASTER_REQUEST != $event->getRequestType() ) {
            return;
        }

        if ( $this->context->isGranted('IS_AUTHENTICATED_FULLY') ) {
            /* @var $filters \Doctrine\ORM\Query\FilterCollection */
            $filters = $this->em->getFilters();
            $filters->enable('ownable_entity');

            $filter = $filters->getFilter('ownable_entity');
            $filter->setParameter('user_id', $this->context->getToken()->getUser()->getId());
        }
    }

}