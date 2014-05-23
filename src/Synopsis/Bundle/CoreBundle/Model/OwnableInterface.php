<?php

namespace Synopsis\Bundle\CoreBundle\Model;

/**
 * Interface OwnableInterface
 *
 * @package Synopsis\Bundle\CoreBundle\Model
 */
interface OwnableInterface
{

    /**
     * Get the related user.
     *
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function getUser ();

}