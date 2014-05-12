<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UnitType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\UnitTypeRepository")
 */
class UnitType
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
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="UnitType", mappedBy="parent")
     **/
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="UnitType", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity="AttackType", mappedBy="unittypes")
     */
    private $attacktypes;

    /**
     * @ORM\ManyToMany(targetEntity="Ability", mappedBy="unittypes")
     */
    private $abilities;

    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="unittype")
     */
    private $units;

    public function __construct()
    {
        $this->attacktypes = new ArrayCollection();
        $this->abilities = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->units = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return UnitType
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
     * Set parent
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $parent
     * @return UnitType
     */
    public function setParent(\Pardalis\WaSUnitBundle\Entity\UnitType $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Pardalis\WaSUnitBundle\Entity\UnitType 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add attacktypes
     *
     * @param \Pardalis\WaSUnitBundle\Entity\AttackType $attacktypes
     * @return UnitType
     */
    public function addAttacktype(\Pardalis\WaSUnitBundle\Entity\AttackType $attacktypes)
    {
        $this->attacktypes[] = $attacktypes;

        return $this;
    }

    /**
     * Remove attacktypes
     *
     * @param \Pardalis\WaSUnitBundle\Entity\AttackType $attacktypes
     */
    public function removeAttacktype(\Pardalis\WaSUnitBundle\Entity\AttackType $attacktypes)
    {
        $this->attacktypes->removeElement($attacktypes);
    }

    /**
     * Get attacktypes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttacktypes()
    {
        return $this->attacktypes;
    }

    /**
     * Add children
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $children
     * @return UnitType
     */
    public function addChild(\Pardalis\WaSUnitBundle\Entity\UnitType $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $children
     */
    public function removeChild(\Pardalis\WaSUnitBundle\Entity\UnitType $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add abilities
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Ability $abilities
     * @return UnitType
     */
    public function addAbility(\Pardalis\WaSUnitBundle\Entity\Ability $abilities)
    {
        $this->abilities[] = $abilities;

        return $this;
    }

    /**
     * Remove abilities
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Ability $abilities
     */
    public function removeAbility(\Pardalis\WaSUnitBundle\Entity\Ability $abilities)
    {
        $this->abilities->removeElement($abilities);
    }

    /**
     * Get abilities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbilities()
    {
        return $this->abilities;
    }

    /**
     * Add units
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
     * @return UnitType
     */
    public function addUnit(\Pardalis\WaSUnitBundle\Entity\Unit $units)
    {
        $this->units[] = $units;

        return $this;
    }

    /**
     * Remove units
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
     */
    public function removeUnit(\Pardalis\WaSUnitBundle\Entity\Unit $units)
    {
        $this->units->removeElement($units);
    }

    /**
     * Get units
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnits()
    {
        return $this->units;
    }
}
