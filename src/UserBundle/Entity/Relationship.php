<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relationship
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Relationship
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
     * @ORM\Column(name="dst_usr_id", type="integer")
     */
    private $dstUsrId;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_id", type="integer")
     */
    private $type_id;


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
     * @return Relationship
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
     * Set dstUsrId
     *
     * @param integer $dstUsrId
     * @return Relationship
     */
    public function setDstUsrId($dstUsrId)
    {
        $this->dstUsrId = $dstUsrId;

        return $this;
    }

    /**
     * Get dstUsrId
     *
     * @return integer 
     */
    public function getDstUsrId()
    {
        return $this->dstUsrId;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Relationship
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }
}
