<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttackType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\AttackTypeRepository")
 */
class AttackType
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
     * @ORM\Column(name="name", type="string", length=32)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer")
     */
    private $sortOrder;

    /**
     * @ORM\ManyToOne(targetEntity="UnitType", inversedBy="attack_types")
     * @ORM\JoinColumn(name="unittype_id", referencedColumnName="id")
     */
    private $unittype;

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
     * Set name
     *
     * @param string $name
     * @return AttackType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return AttackType
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set unittype
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $unittype
     * @return AttackType
     */
    public function setUnittype(\Pardalis\WaSUnitBundle\Entity\UnitType $unittype = null)
    {
        $this->unittype = $unittype;

        return $this;
    }

    /**
     * Get unittype
     *
     * @return \Pardalis\WaSUnitBundle\Entity\UnitType 
     */
    public function getUnittype()
    {
        return $this->unittype;
    }
}
