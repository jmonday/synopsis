<?php

namespace Synopsis\Bundle\CoreBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface,
    Symfony\Component\Form\FormFactoryInterface;

/**
 * Class AbstractManager
 *
 * @package Synopsis\Bundle\CoreBundle\Manager
 */
abstract class AbstractManager
{

    /**
     * The event dispatcher.
     *
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * The entity class name.
     * Example: "Acme/Bundle/SaleBundle/Entity/Lead"
     *
     * @var string
     */
    private $entityClass;

    /**
     * Doctrine object manager.
     *
     * @var ObjectManager
     */
    private $om;

    /**
     * The form factory.
     *
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * The event repository.
     *
     * @var mixed
     */
    private $repository;

    /**
     * Manager constructor.
     *
     * @param ObjectManager $om Doctrine object manager.
     * @param FormFactoryInterface $formFactory The form factory.
     * @param EventDispatcherInterface $dispatcher The event dispatcher service.
     * @param string $entityClass The entity class.
     */
    public function __construct ( ObjectManager $om, FormFactoryInterface $formFactory, EventDispatcherInterface $dispatcher, $entityClass )
    {
        $this->om          = $om;
        $this->entityClass = $entityClass;
        $this->repository  = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->dispatcher  = $dispatcher;
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
     * @param array $order An array of order parameters.
     * @param array $criteria An optional array of criteria.
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollectionOrdered ( array $order, array $criteria = [] )
    {
        return $this->getCollection($criteria, $order);
    }

}