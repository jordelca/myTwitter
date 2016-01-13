<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Retwit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Retwit
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
     * @var integer
     *
     * @ORM\Column(name="src_usr_id", type="integer")
     */
    private $srcUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="dst_twit_id", type="integer")
     */
    private $dstTwitId;


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
     * Set srcUsrId
     *
     * @param integer $srcUsrId
     * @return Retwit
     */
    public function setSrcUsrId($srcUsrId)
    {
        $this->srcUsrId = $srcUsrId;

        return $this;
    }

    /**
     * Get srcUsrId
     *
     * @return integer
     */
    public function getSrcUsrId()
    {
        return $this->srcUsrId;
    }

    /**
     * Set dstTwitId
     *
     * @param integer $dstTwitId
     * @return Retwit
     */
    public function setDstTwitId($dstTwitId)
    {
        $this->dstTwitId = $dstTwitId;

        return $this;
    }

    /**
     * Get dstTwitId
     *
     * @return integer 
     */
    public function getDstTwitId()
    {
        return $this->dstTwitId;
    }
}
