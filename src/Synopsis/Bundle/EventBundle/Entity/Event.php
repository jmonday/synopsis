<?php

namespace Synopsis\Bundle\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use FOS\UserBundle\Model\UserInterface;

use Synopsis\Bundle\AttributeBundle\Entity\Attribute,
    Synopsis\Bundle\AttributeBundle\Entity\Value,
    Synopsis\Bundle\AttributeBundle\Model\AttributeInterface,
    Synopsis\Bundle\AttributeBundle\Model\ValueInterface,
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
     * @var Attribute[]|ArrayCollection
     */
    private $attributes;

    /**
     * @var ValueInterface[]|ArrayCollection
     */
    private $attributeValues;

    /**
     * @var SubjectInterface
     */
    private $subject;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Simple constructor.
     */
    public function __construct ( SubjectInterface $subject, SubjectActionInterface $action )
    {
        $this->attributes = new ArrayCollection();
        $this->attributeValues = new ArrayCollection();

        $this->setSubject($subject);
        $this->setAction($action);
        $this->initAttributeValues();
    }

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
    public function initAttributeValues ()
    {
        foreach ( $this->getAction()->getAttributes() as $attribute ) {
            $this->addAttributeValue($attribute, new Value());
        }
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
    public function setAction ( SubjectActionInterface $action )
    {
        $this->action = $action;
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
    public function addAttributeValue ( AttributeInterface $attribute, ValueInterface $value )
    {
        $value->setAttribute($attribute);
        $this->attributeValues->add($value);

        return $this;
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
    public function getUser ()
    {
        return $this->user;
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
