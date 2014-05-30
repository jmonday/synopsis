<?php

namespace Synopsis\Bundle\CoreBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Interface OwnableInterface
 *
 * @package Synopsis\Bundle\CoreBundle\Model
 */
interface OwnableInterface
{

    /**
     * Set the related user.
     *
     * @param UserInterface $user
     * @return OwnableInterface
     */
    public function setUser ( UserInterface $user );

    /**
     * Get the related user.
     *
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function getUser ();

}