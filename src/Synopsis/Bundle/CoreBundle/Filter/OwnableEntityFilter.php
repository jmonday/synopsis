<?php

namespace Synopsis\Bundle\CoreBundle\Filter;

use Doctrine\ORM\Mapping\ClassMetaData,
    Doctrine\ORM\Query\Filter\SQLFilter;

/**
 * Class OwnableEntityFilter
 *
 * @package Synopsis\Bundle\CoreBundle\Filter
 */
class OwnableEntityFilter extends SQLFilter
{

    /**
     * {@inheritdoc}
     */
    public function addFilterConstraint ( ClassMetadata $targetEntity, $targetTableAlias )
    {
        $filter = '';

        if ( $targetEntity->reflClass->implementsInterface('Synopsis\Bundle\CoreBundle\Model\OwnableInterface') ) {
            // $filter = $targetTableAlias . sprintf('.user_id = %s', $this->getParameter('user_id'));
            $filter = $targetTableAlias . '.user_id = 1';
        }

        return $filter;

    }

}