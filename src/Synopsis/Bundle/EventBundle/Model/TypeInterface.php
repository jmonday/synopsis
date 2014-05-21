<?php

namespace Synopsis\Bundle\EventBundle\Model;

use Doctrine\Common\Collections\Collection;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface;

/**
 * Interface TypeInterface
 *
 * @package Synopsis\Bundle\EventBundle\Model
 */
interface TypeInterface
{

    /**
     * Get the type's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * @return AttributeInterface[]|Collection
     */
    public function getAttributes ();

    /**
     * Set the type's name.
     *
     * @param string $name The name to set.
     * @return TypeInterface
     */
    public function setName ( $name );

    /**
     * Get the type's name.
     *
     * @return string
     */
    public function getName ();

    /**
     * Set the type's namespace.
     *
     * @param string $namespace The namespace to set.
     * @return TypeInterface
     */
    public function setNamespace ( $namespace );

    /**
     * Get the type's namespace.
     *
     * @return string
     */
    public function getNamespace ();

    /**
     * Set the type's description.
     *
     * @param string $description The description to set.
     * @return TypeInterface
     */
    public function setDescription ( $description );

    /**
     * Get the type's description.
     *
     * @return string
     */
    public function getDescription ();

    /**
     * Set the type's creation time.
     *
     * @param \DateTime $createdAt
     * @return TypeInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the type's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the type's update time.
     *
     * @param \DateTime $updatedAt
     * @return TypeInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the type's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
