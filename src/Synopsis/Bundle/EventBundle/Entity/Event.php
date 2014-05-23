<?php

namespace Synopsis\Bundle\EventBundle\Entity;

use Doctrine\Common\Collections\Collection;

use Synopsis\Bundle\AttributeBundle\Model\ValueInterface,
    Synopsis\Bundle\EventBundle\Model\EventInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectActionInterface;

/**
 * Class Event
 *
 * @package Synopsis\Bundle\EventBundle\Entity
 */
class Event implements EventInterface
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var SubjectActionInterface
     */
    private $action;

    /**
     * @var ValueInterface[]|Collection
     */
    private $attributeValues;

    /**
     * @var SubjectInterface
     */
    private $subject;

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
    public function getAction ()
    {
        return $this->action;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributeValues ()
    {
        return $this->attributeValues;
    }

    /**
     * {@inheritdoc}
     */
    public function setSubject ( SubjectInterface $subject )
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubject ()
    {
        return $this->subject;
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
