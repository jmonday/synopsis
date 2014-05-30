<?php

namespace Synopsis\Bundle\AttributeBundle\Model;

use Synopsis\Bundle\EventBundle\Model\EventInterface;

/**
 * Class Value
 *
 * @package Synopsis\Bundle\AttributeBundle\Model
 */
interface ValueInterface
{

    /**
     * Convert the attribute value to a string.
     *
     * @return string
     */
    public function __toString ();

    /**
     * Get the value's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * Set the value's related attribute.
     *
     * @param AttributeInterface $attribute The attribute to relate.
     * @return ValueInterface
     */
    public function setAttribute ( AttributeInterface $attribute );

    /**
     * Get the value's related attribute.
     *
     * @return AttributeInterface
     */
    public function getAttribute ();

    /**
     * Set the value's related event.
     *
     * @param EventInterface $event
     * @return ValueInterface
     */
    public function setEvent ( EventInterface $event );

    /**
     * Get the value's related event.
     *
     * @return EventInterface
     */
    public function getEvent ();

    /**
     * Set the value's value.
     *
     * @param string $value
     * @return ValueInterface
     */
    public function setValue ( $value );

    /**
     * Get the value's value.
     *
     * @return string
     */
    public function getValue ();

    /**
     * Set the attribute's creation time.
     * This method should be called automatically via Doctrine lifecycle callbacks.
     *
     * @return void
     */
    public function setCreatedAt ();

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
     * @return void
     */
    public function setUpdatedAt ();

    /**
     * Get the attribute's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
