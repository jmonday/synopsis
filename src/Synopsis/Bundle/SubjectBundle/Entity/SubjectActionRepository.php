<?php

namespace Synopsis\Bundle\SubjectBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SubjectActionRepository
 *
 * @package Synopsis\Bundle\SubjectBundle\Entity
 */
class SubjectActionRepository extends EntityRepository
{

    /**
     * Find a single subject action via UUID.
     *
     * @param string $uuid The subject action's UUID.
     * @throws NotFoundHttpException
     * @return \Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface
     */
    public function getByUuid ( $uuid )
    {
        $action = $this->createQueryBuilder('action')
            ->where('action.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
        ;

        if ( ! $action ) {
            throw new NotFoundHttpException('The specified subject action does not exist.');
        }

        return $action;
    }

}