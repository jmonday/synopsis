<?php

namespace Synopsis\Bundle\EventBundle\Model;

/**
 * Interface SubjectInterface
 *
 * @package Synopsis\Bundle\EventBundle\Model
 */
interface SubjectInterface
{

    /**
     * Get the subject's ID number.
     *
     * @return integer
     */
    public function getId ();

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
