<?php

namespace Synopsis\Bundle\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Security\Core\User\UserInterface;

use Synopsis\Bundle\AttributeBundle\Entity\Value,
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
     * @var ValueInterface[]|ArrayCollection
     */
    private $attributeValues;

    /**
     * @var string
     */
    private $comments;

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
    public function __construct ( UserInterface $user, SubjectInterface $subject, SubjectActionInterface $action )
    {
        $this->attributeValues = new ArrayCollection();

        $this->setUser($user);
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
    public function setComments ( $comments )
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getComments ()
    {
        return $this->comments;
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
    public function setUser ( UserInterface $user )
    {
        $this->user = $user;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUser ()
    {
        return $this->user;
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

    /**
     * This method is automatically called by Doctrine lifecycle events, the event obviously being, pre-flush.
     */
    public function preFlush ()
    {
        /**
         * Now that we have persisted the event, we can associate it to the related attribute values.
         */
        foreach ( $this->attributeValues as $value ) {
            $value->setEvent($this);
        }
    }

    /**
     * This method is automatically called by Doctrine lifecycle events, the event obviously being, pre-persist.
     */
    public function prePersist ()
    {
        $this->createdAt = $this->updatedAt = new \DateTime();
    }

    /**
     * This method is automatically called by Doctrine lifecycle events, the event obviously being, pre-update.
     */
    public function preUpdate ()
    {
        $this->updatedAt = new \DateTime();
    }

}
