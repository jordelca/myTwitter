<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * Twit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Twit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      max = 150,
     *      minMessage = "Twits must be at least {{ limit }} characters long",
     *      maxMessage = "Twits cannot be longer than {{ limit }} characters"
     * )
     *
     * @ORM\Column(name="message", type="string", length=150)
     */
    private $message;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="src_usr_id", referencedColumnName="id")
     */
    private $srcUsrId;

    /**
     * @var \DateTime
     * @ORM\Column(name="creation_time", type="datetime")
     */
    private $creationTime;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="likes", type="integer")
     */
    private $likes = 0;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="retwits", type="integer")
     */
    private $retwits = 0;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Twit
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set srcUsrId
     *
     * @param User $srcUsrId
     * @return Twit
     */
    public function setSrcUsrId(User $srcUsrId)
    {
        $this->srcUsrId = $srcUsrId;

        return $this;
    }

    /**
     * Get srcUsrId
     *
     * @return User
     */
    public function getSrcUsrId()
    {
        return $this->srcUsrId;
    }

    /**
     * Set creationTime
     *
     * @param \DateTime $creationTime
     * @return Twit
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;

        return $this;
    }

    /**
     * Get creationTime
     *
     * @return \DateTime 
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Twit
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set retwits
     *
     * @param integer $retwits
     * @return Twit
     */
    public function setRetwits($retwits)
    {
        $this->retwits = $retwits;

        return $this;
    }

    /**
     * Get retwits
     *
     * @return integer 
     */
    public function getRetwits()
    {
        return $this->retwits;
    }

    public function countTwitCharacters()
    {
        return strlen($this->getMessage());
    }
}
