<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Synopsis\Bundle\CoreBundle\Model\AbstractManager;

/**
 * Class SubjectActionManager
 *
 * @package Synopsis\Bundle\SubjectBundle\Manager
 */
class SubjectActionManager extends AbstractManager
{

    /**
     * Find a single subject action via UUID.
     *
     * @param string $uuid The subject action's UUID.
     * @throws NotFoundHttpException
     * @return SubjectActionInterface
     */
    public function getByUuid ( $uuid )
    {
        $action = $this->repository->findOneBy([
            'uuid' => $uuid,
        ]);

        if ( ! $action ) {
            throw new NotFoundHttpException('The specified action does not exist.');
        }

        return $action;
    }

}