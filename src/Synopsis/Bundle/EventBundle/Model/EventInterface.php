<?php

namespace Synopsis\Bundle\EventBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface,
    Synopsis\Bundle\AttributeBundle\Model\ValueInterface,
    Synopsis\Bundle\CoreBundle\Model\OwnableInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface;

/**
 * Interface EventInterface
 *
 * @package Synopsis\Bundle\EventBundle\Model
 */
interface EventInterface extends OwnableInterface
{

    /**
     * Convert the event to a string.
     *
     * @return string
     */
    public function __toString ();

    /**
     * Initialize the event's attribute values.
     *
     * @return void
     */
    public function initAttributeValues ();

    /**
     * Get the event's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * Set the event's related subject action.
     *
     * @param SubjectActionInterface $action The action to set.
     * @return EventInterface
     */
    public function setAction ( SubjectActionInterface $action );

    /**
     * Get the event's related subject action.
     *
     * @return SubjectActionInterface
     */
    public function getAction ();

    /**
     * Add an attribute value to this event.
     *
     * @param AttributeInterface $attribute The attribute for the added value.
     * @param ValueInterface $value The attribute value to add.
     * @return EventInterface
     */
    public function addAttributeValue ( AttributeInterface $attribute, ValueInterface $value );

    /**
     * Get the collection of related attribute values.
     *
     * @return ValueInterface[]|ArrayCollection
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
     * Set the attribute's creation time.
     * This method should be called automatically via Doctrine lifecycle callbacks.
     *
     * @param \DateTime $createdAt The timestamp the event was created.
     * @return EventInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the attribute's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the attribute's update time.
     * This method should be called automatically via Doctrine lifecycle callbacks.
     *
     * @param \DateTime $updatedAt The timestamp the event was most recently updated.
     * @return EventInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the attribute's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
