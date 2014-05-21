<?php

namespace Synopsis\Bundle\AttributeBundle\Entity;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface;
use Synopsis\Bundle\AttributeBundle\Model\Types;

/**
 * Class Attribute
 *
 * @package Synopsis\Bundle\AttributeBundle\Entity
 */
class Attribute implements AttributeInterface
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $type = Types::TEXT;

    /**
     * @var array
     */
    private $configuration;

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
    public function getId ()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setName ( $name )
    {
        $this->name = $name;

        return $this;
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
    public function setKey ( $key )
    {
        $this->key = $key;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey ()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function setType ( $type )
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration ( array $configuration )
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration ()
    {
        return $this->configuration;
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
