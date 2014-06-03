<?php

namespace Synopsis\Bundle\SubjectBundle\Entity;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Synopsis\Bundle\CoreBundle\Entity\CoreRepository;

/**
 * Class SubjectActionRepository
 *
 * @package Synopsis\Bundle\SubjectBundle\Entity
 */
class SubjectActionRepository extends CoreRepository
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