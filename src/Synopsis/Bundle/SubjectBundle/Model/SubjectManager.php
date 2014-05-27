<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Synopsis\Bundle\CoreBundle\Model\AbstractManager;

/**
 * Class SubjectManager
 *
 * @package Synopsis\Bundle\SubjectBundle\Manager
 */
class SubjectManager extends AbstractManager
{

    /**
     * Find a single subject via UUID.
     *
     * @param string $uuid The subject's UUID.
     * @return SubjectInterface
     */
    public function getByUuid ( $uuid )
    {
        return $this->repository->findOneBy([
            'uuid' => $uuid,
        ]);
    }

}