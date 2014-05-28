<?php

namespace Synopsis\Bundle\SubjectBundle\Entity;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface;

/**
 * Class SubjectAction
 *
 * @package Synopsis\Bundle\SubjectBundle\Entity
 */
class SubjectAction implements SubjectActionInterface
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var AttributeInterface[]|\Doctrine\Common\Collections\Collection
     */
    private $attributes;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * {@inheritdoc}
     */
    public function __toString ()
    {
        return sprintf('%s@%s', __CLASS__, $this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes ()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function setName ( $name )
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription ( $description )
    {
        $this->description = $description;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription ()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt ( \DateTime $createdAt )
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt ()
    {
        return $this->createdAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt ( \DateTime $updatedAt )
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt ()
    {
        return $this->updatedAt;
    }

}