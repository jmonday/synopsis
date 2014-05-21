<?php

namespace Synopsis\Bundle\AttributeBundle\Model;

/**
 * Class AttributeInterface
 *
 * @package Synopsis\Bundle\AttributeBundle\Model
 */
interface AttributeInterface
{

    /**
     * Get the attribute's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * Set the attribute's name.
     *
     * @param string $name
     * @return AttributeInterface
     */
    public function setName ( $name );

    /**
     * Get the attribute's name.
     *
     * @return string
     */
    public function getName ();

    /**
     * Set the attribute's key.
     *
     * @param string $key
     * @return AttributeInterface
     */
    public function setKey ( $key );

    /**
     * Get the attribute's key.
     *
     * @return string
     */
    public function getKey ();

    /**
     * Set the attribute's type.
     *
     * @param string $type
     * @return AttributeInterface
     */
    public function setType ( $type );

    /**
     * Get the attribute's type.
     *
     * @return string
     */
    public function getType ();

    /**
     * Set the attribute's configuration.
     *
     * @param array $configuration
     * @return AttributeInterface
     */
    public function setConfiguration ( array $configuration );

    /**
     * Get the attribute's configuration.
     *
     * @return array
     */
    public function getConfiguration ();

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
