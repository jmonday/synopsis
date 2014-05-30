<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

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
     * @return SubjectActionInterface
     */
    public function getByUuid ( $uuid )
    {
        return $this->repository->findOneBy([
            'uuid' => $uuid,
        ]);
    }

}