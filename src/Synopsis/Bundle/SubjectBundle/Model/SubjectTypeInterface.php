<?php

namespace Synopsis\Bundle\SubjectBundle\Model;

/**
 * Interface SubjectTypeInterface
 *
 * @package Synopsis\Bundle\SubjectBundle\Model
 */
interface SubjectTypeInterface
{

    /**
     * Convert the subject to a string.
     *
     * @return string
     */
    public function __toString ();

    /**
     * Get the subject type's ID number.
     *
     * @return integer
     */
    public function getId ();

    /**
     * @return SubjectActionInterface[]|\Doctrine\Common\Collections\Collection
     */
    public function getActions ();

    /**
     * Set the subject type's name.
     *
     * @param string $name The name to set.
     * @return SubjectTypeInterface
     */
    public function setName ( $name );

    /**
     * Get the subject type's name.
     *
     * @return string
     */
    public function getName ();

    /**
     * Set the subject type's namespace.
     *
     * @param string $namespace The namespace to set.
     * @return SubjectTypeInterface
     */
    public function setNamespace ( $namespace );

    /**
     * Get the subject type's namespace.
     *
     * @return string
     */
    public function getNamespace ();

    /**
     * Set the subject type's description.
     *
     * @param string $description The description to set.
     * @return SubjectTypeInterface
     */
    public function setDescription ( $description );

    /**
     * Get the subject type's description.
     *
     * @return string
     */
    public function getDescription ();

    /**
     * Set the subject type's creation time.
     *
     * @param \DateTime $createdAt
     * @return SubjectTypeInterface
     */
    public function setCreatedAt ( \DateTime $createdAt );

    /**
     * Get the subject type's creation time.
     *
     * @return \DateTime
     */
    public function getCreatedAt ();

    /**
     * Set the subject type's update time.
     *
     * @param \DateTime $updatedAt
     * @return SubjectTypeInterface
     */
    public function setUpdatedAt ( \DateTime $updatedAt );

    /**
     * Get the subject type's update time.
     *
     * @return \DateTime
     */
    public function getUpdatedAt ();

}
