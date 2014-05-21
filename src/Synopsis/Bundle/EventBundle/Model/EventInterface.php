<?php

namespace Synopsis\Bundle\EventBundle\Model;

use Doctrine\Common\Collections\Collection;

use Synopsis\Bundle\AttributeBundle\Model\ValueInterface;

/**
 * Interface EventInterface
 *
 * @package Synopsis\Bundle\EventBundle\Model
 */
interface EventInterface
{

    /**
     * Get the event's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * @return ValueInterface[]|Collection
     */
    public function getAttributeValues ();

    /**
     * Set the event's related subject.
     *
     * @param SubjectInterface $subject The subject to relate.
     * @return EventInterface
     */
    public function setSubject ( SubjectInterface $subject );

    /**
     * Get the event's related subject.
     *
     * @return SubjectInterface
     */
    public function getSubject ();

    /**
     * Set the event's related type.
     *
     * @param TypeInterface $type The type to relate.
     * @return EventInterface
     */
    public function setType ( TypeInterface $type );

    /**
     * Get the event's related type.
     *
     * @return TypeInterface
     */
    public function getType ();

    /**
     * Set the event's creation time.
     *
     * @param \DateTime $createdAt
     * @return EventInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the event's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the event's update time.
     *
     * @param \DateTime $updatedAt
     * @return EventInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the event's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
