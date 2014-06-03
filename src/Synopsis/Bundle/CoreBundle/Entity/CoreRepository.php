<?php

namespace Synopsis\Bundle\CoreBundle\Entity;

use Doctrine\Common\Collections\Criteria,
    Doctrine\ORM\EntityRepository;

/**
 * Class CoreRepository
 *
 * @package Synopsis\Bundle\CoreBundle\Entity
 */
class CoreRepository extends EntityRepository
{

    /**
     * Get a collection of entities matching an optional array of criteria.
     *
     * @param \Doctrine\Common\Collections\Criteria $criteria
     * @param array $order An optional array of order parameters.
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollection ( Criteria $criteria = null, array $order = [] )
    {
        $entities = $this->createQueryBuilder($this->getEntityName());

        if ( ! is_null($criteria) ) {
            $entities->addCriteria($criteria);
        }

        if ( ! empty($order) ) {
            foreach ( $order as $sort => $direction ) {
                $entities->addOrderBy(sprintf('%s.%s', $this->getEntityName(), $sort), $direction);
            }
        }

        return $entities->getQuery()->getResult();
    }

    /**
     * Get an ordered collection of entities matching an optional array of criteria.
     *
     * @param array $order An array of order parameters.
     * @param \Doctrine\Common\Collections\Criteria $criteria
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollectionOrdered ( array $order, Criteria $criteria = null )
    {
        return $this->getCollection($criteria, $order);
    }

}