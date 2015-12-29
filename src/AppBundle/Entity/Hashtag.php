<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hashtag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Hashtag
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
     *
     * @ORM\Column(name="hashtag_code", type="string", length=255)
     */
    private $hashtagCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_time_used", type="datetime")
     */
    private $firstTimeUsed;

    /**
     * @var integer
     *
     * @ORM\Column(name="times_used", type="integer")
     */
    private $timesUsed;


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
     * Set hashtagCode
     *
     * @param string $hashtagCode
     * @return Hashtag
     */
    public function setHashtagCode($hashtagCode)
    {
        $this->hashtagCode = $hashtagCode;

        return $this;
    }

    /**
     * Get hashtagCode
     *
     * @return string 
     */
    public function getHashtagCode()
    {
        return $this->hashtagCode;
    }

    /**
     * Set firstTimeUsed
     *
     * @param \DateTime $firstTimeUsed
     * @return Hashtag
     */
    public function setFirstTimeUsed($firstTimeUsed)
    {
        $this->firstTimeUsed = $firstTimeUsed;

        return $this;
    }

    /**
     * Get firstTimeUsed
     *
     * @return \DateTime 
     */
    public function getFirstTimeUsed()
    {
        return $this->firstTimeUsed;
    }

    /**
     * Set timesUsed
     *
     * @param integer $timesUsed
     * @return Hashtag
     */
    public function setTimesUsed($timesUsed)
    {
        $this->timesUsed = $timesUsed;

        return $this;
    }

    /**
     * Get timesUsed
     *
     * @return integer 
     */
    public function getTimesUsed()
    {
        return $this->timesUsed;
    }
}
