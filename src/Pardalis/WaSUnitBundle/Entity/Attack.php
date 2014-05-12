<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attack
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\AttackRepository")
 */
class Attack
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
     * @ORM\Column(name="range_0", type="integer")
     */
    private $range0;

    /**
     * @var integer
     *
     * @ORM\Column(name="range_1", type="integer")
     */
    private $range1;

    /**
     * @var integer
     *
     * @ORM\Column(name="range_2", type="integer")
     */
    private $range2;

    /**
     * @var integer
     *
     * @ORM\Column(name="range_3", type="integer")
     */
    private $range3;

    /**
     * @ORM\ManyToOne(targetEntity="Unit", inversedBy="attacks")
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity="AttackType", inversedBy="attacks")
     */
    private $attacktype;

    public function __construct()
    {
    }

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
     * Set range0
     *
     * @param integer $range0
     * @return Attack
     */
    public function setRange0($range0)
    {
        $this->range0 = $range0;

        return $this;
    }

    /**
     * Get range0
     *
     * @return integer 
     */
    public function getRange0()
    {
        return $this->range0;
    }

    /**
     * Set range1
     *
     * @param integer $range1
     * @return Attack
     */
    public function setRange1($range1)
    {
        $this->range1 = $range1;

        return $this;
    }

    /**
     * Get range1
     *
     * @return integer 
     */
    public function getRange1()
    {
        return $this->range1;
    }

    /**
     * Set range2
     *
     * @param integer $range2
     * @return Attack
     */
    public function setRange2($range2)
    {
        $this->range2 = $range2;

        return $this;
    }

    /**
     * Get range2
     *
     * @return integer 
     */
    public function getRange2()
    {
        return $this->range2;
    }

    /**
     * Set range3
     *
     * @param integer $range3
     * @return Attack
     */
    public function setRange3($range3)
    {
        $this->range3 = $range3;

        return $this;
    }

    /**
     * Get range3
     *
     * @return integer 
     */
    public function getRange3()
    {
        return $this->range3;
    }

    /**
     * Set unit
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $unit
     * @return Attack
     */
    public function setUnit(\Pardalis\WaSUnitBundle\Entity\Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Pardalis\WaSUnitBundle\Entity\Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set attacktype
     *
     * @param \Pardalis\WaSUnitBundle\Entity\AttackType $attacktype
     * @return Attack
     */
    public function setAttacktype(\Pardalis\WaSUnitBundle\Entity\AttackType $attacktype = null)
    {
        $this->attacktype = $attacktype;

        return $this;
    }

    /**
     * Get attacktype
     *
     * @return \Pardalis\WaSUnitBundle\Entity\AttackType 
     */
    public function getAttacktype()
    {
        return $this->attacktype;
    }
}
