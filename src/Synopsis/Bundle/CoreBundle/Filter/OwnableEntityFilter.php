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
            $filter = sprintf('%s.user_id = %s', $targetTableAlias, $this->getParameter('user_id'));
        }

        return $filter;

    }

}