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
     *
     * @param \DateTime $createdAt
     * @return AttributeInterface
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
     *
     * @param \DateTime $updatedAt
     * @return AttributeInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the attribute's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
