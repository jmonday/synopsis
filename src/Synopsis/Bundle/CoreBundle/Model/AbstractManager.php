<?php

namespace Synopsis\Bundle\CoreBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\Container,
    Symfony\Component\EventDispatcher\EventDispatcherInterface,
    Symfony\Component\Form\Form,
    Symfony\Component\Form\FormFactoryInterface;

/**
 * Class AbstractManager
 *
 * @package Synopsis\Bundle\CoreBundle\Manager
 */
abstract class AbstractManager
{

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * The event dispatcher.
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * The entity class name.
     * Example: "Acme/Bundle/SaleBundle/Entity/Lead"
     *
     * @var string
     */
    protected $entityClass;

    /**
     * Doctrine object manager.
     *
     * @var ObjectManager
     */
    protected $om;

    /**
     * The form factory.
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * The event repository.
     *
     * @var mixed
     */
    protected $repository;

    /**
     * Manager constructor.
     *
     * @param Container $container The service container.
     * @param string $entityClass The entity class.
     */
    public function __construct ( Container $container, $entityClass )
    {
        $this->container   = $container;
        $this->entityClass = $entityClass;
        $this->om          = $this->container->get('doctrine.orm.entity_manager');
        $this->formFactory = $this->container->get('form.factory');
        $this->dispatcher  = $this->container->get('event_dispatcher');
        $this->repository  = $this->om->getRepository($this->entityClass);
    }

    /**
     * Get a specific entity via ID.
     *
     * @param mixed $id The ID of the entity to get.
     * @return mixed
     */
    public function get ( $id )
    {
        return $this->repository->find($id);
    }

    /**
     * Get a collection of entities matching an optional array of criteria.
     *
     * @todo: This belongs in a repository!
     *
     * @param array $criteria An optional array of criteria.
     * @param array $order An optional array of order parameters.
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollection ( array $criteria = [], array $order = [] )
    {
        return $this->repository->findBy($criteria, $order);
    }

    /**
     * Get an ordered collection of entities matching an optional array of criteria.
     *
     * @todo: This belongs in a repository!
     *
     * @param array $order An array of order parameters.
     * @param array $criteria An optional array of criteria.
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollectionOrdered ( array $order, array $criteria = [] )
    {
        return $this->getCollection($criteria, $order);
    }

}