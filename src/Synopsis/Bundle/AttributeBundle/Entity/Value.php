<?php

namespace Synopsis\Bundle\AttributeBundle\Entity;

use Synopsis\Bundle\AttributeBundle\Model\AttributeInterface,
    Synopsis\Bundle\AttributeBundle\Model\ValueInterface,
    Synopsis\Bundle\EventBundle\Model\EventInterface;

/**
 * Class Value
 *
 * @package Synopsis\Bundle\AttributeBundle\Entity
 */
class Value implements ValueInterface
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var AttributeInterface
     */
    private $attribute;

    /**
     * @var EventInterface
     */
    private $event;

    /**
     * @var string
     */
    private $value;

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
    public function setAttribute ( AttributeInterface $attribute )
    {
        $this->attribute = $attribute;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute ()
    {
        return $this->attribute;
    }

    /**
     * {@inheritdoc}
     */
    public function setEvent ( EventInterface $event )
    {
        $this->event = $event;
    }

    /**
     * {@inheritdoc}
     */
    public function getEvent ()
    {
        return $this->event;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue ( $value )
    {
        $this->value = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue ()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc
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
