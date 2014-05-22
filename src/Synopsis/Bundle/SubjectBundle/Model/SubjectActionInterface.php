<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

use Doctrine\Common\Collections\Collection;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface;

/**
 * Interface SubjectActionInterface
 *
 * @package Synopsis\Bundle\SubjectBundle\Model
 */
interface SubjectActionInterface
{

    /**
     * Get the subject action's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * @return AttributeInterface[]|Collection
     */
    public function getAttributes ();

    /**
     * Set the subject action's name.
     *
     * @param string $name The name to set.
     * @return SubjectActionInterface
     */
    public function setName ( $name );

    /**
     * Get the subject action's name.
     *
     * @return string
     */
    public function getName ();

    /**
     * Set the subject action's description.
     *
     * @param string $description The description to set.
     * @return SubjectActionInterface
     */
    public function setDescription ( $description );

    /**
     * Get the subject action's description.
     *
     * @return string
     */
    public function getDescription ();

    /**
     * Set the subject action's creation time.
     *
     * @param \DateTime $createdAt
     * @return SubjectActionInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the subject action's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the subject action's update time.
     *
     * @param \DateTime $updatedAt
     * @return SubjectActionInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the subject action's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}