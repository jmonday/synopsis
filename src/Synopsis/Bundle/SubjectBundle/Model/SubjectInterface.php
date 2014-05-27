<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Doctrine\Common\Collections\Collection;

use Symfony\Component\Validator\Constraints\All;
use Synopsis\Bundle\CoreBundle\Model\OwnableInterface,
    Synopsis\Bundle\EventBundle\Model\EventInterface;

/**
 * Interface SubjectInterface
 *
 * @package Synopsis\Bundle\SubjectBundle\Model
 */
interface SubjectInterface extends OwnableInterface
{

    /**
     * Convert the subject to a string.
     *
     * @return string
     */
    public function __toString ();

    /**
     * Get the subject's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * Get a collection of the subject's related events.
     *
     * @return EventInterface[]|Collection
     */
    public function getEvents ();

    /**
     * Set the subject's name.
     *
     * @param string $name The name to set.
     * @return SubjectInterface
     */
    public function setName ( $name );

    /**
     * Get the subject's name.
     *
     * @return string
     */
    public function getName ();

    /**
     * Set the subject's description.
     *
     * @param string $description The description to set.
     * @return SubjectInterface
     */
    public function setDescription ( $description );

    /**
     * Get the subject's description.
     *
     * @return string
     */
    public function getDescription ();

    /**
     * Set the event's related subject type.
     *
     * @param SubjectTypeInterface $type The subject type to relate.
     * @return EventInterface
     */
    public function setType ( SubjectTypeInterface $type );

    /**
     * Get the event's related subject type.
     *
     * @return SubjectTypeInterface
     */
    public function getType ();

    /**
     * Set the subject's UUID.
     *
     * @return SubjectInterface
     */
    public function setUuid ();

    /**
     * Get the subject's UUID.
     *
     * @return string
     */
    public function getUuid ();

    /**
     * Set the subject's creation time.
     *
     * @param \DateTime $createdAt
     * @return SubjectInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the subject's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the subject's update time.
     *
     * @param \DateTime $updatedAt
     * @return SubjectInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the subject's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
