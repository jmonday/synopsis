<?php

namespace Synopsis\Bundle\SubjectBundle\Entity;

use Rhumsaa\Uuid\Uuid;

use Doctrine\Common\Collections\Collection;

use Symfony\Component\Security\Core\User\UserInterface;

use Synopsis\Bundle\EventBundle\Model\EventInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectInterface,
    Synopsis\Bundle\SubjectBundle\Model\SubjectTypeInterface;

/**
 * Class Subject
 *
 * @package Synopsis\Bundle\SubjectBundle\Entity
 */
class Subject implements SubjectInterface
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var EventInterface[]|Collection
     */
    private $events;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var SubjectTypeInterface
     */
    private $type;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var string
     */
    private $uuid;

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
        return sprintf('%s@%s', __CLASS__, $this->getUuid());
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
    public function getEvents ()
    {
        return $this->events;
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
    public function setType ( SubjectTypeInterface $type )
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
     * {@inheritdoc}
     */
    public function setUuid ()
    {
        $this->uuid = Uuid::uuid5(Uuid::NIL, $this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getUuid ()
    {
        return $this->uuid;
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