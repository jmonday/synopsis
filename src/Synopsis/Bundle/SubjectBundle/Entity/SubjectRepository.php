<?php

namespace Synopsis\Bundle\SubjectBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class SubjectRepository
 *
 * @package Synopsis\Bundle\SubjectBundle\Entity
 */
class SubjectRepository extends EntityRepository
{

    /**
     * Find a single subject via UUID.
     *
     * @param string $uuid The subject's UUID.
     * @throws NotFoundHttpException
     * @return \Synopsis\Bundle\SubjectBundle\Model\SubjectInterface
     */
    public function getByUuid ( $uuid )
    {
        $subject = $this->createQueryBuilder('subject')
            ->where('subject.uuid = :uuid')
            ->setParameter('uuid', $uuid)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
        ;

        if ( ! $subject ) {
            throw new NotFoundHttpException('The specified subject does not exist.');
        }

        return $subject;
    }

}