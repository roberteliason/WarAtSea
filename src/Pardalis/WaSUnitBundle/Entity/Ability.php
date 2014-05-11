<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ability
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\AbilityRepository")
 */
class Ability
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
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Unit", mappedBy="abilities")
     */
    private $units;

    /**
     * @ORM\ManyToMany(targetEntity="UnitType", inversedBy="abilities")
     * @ORM\JoinTable(name="unittype_abilities")
     */
    private $unittypes;

    public function __construct()
    {
        $this->units = new ArrayCollection();
        $this->unittypes = new ArrayCollection();
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
     * @return Ability
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
     * Set description
     *
     * @param string $description
     * @return Ability
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add units
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
     * @return Ability
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

    /**
     * Add unittypes
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $unittypes
     * @return Ability
     */
    public function addUnittype(\Pardalis\WaSUnitBundle\Entity\UnitType $unittypes)
    {
        $this->unittypes[] = $unittypes;

        return $this;
    }

    /**
     * Remove unittypes
     *
     * @param \Pardalis\WaSUnitBundle\Entity\UnitType $unittypes
     */
    public function removeUnittype(\Pardalis\WaSUnitBundle\Entity\UnitType $unittypes)
    {
        $this->unittypes->removeElement($unittypes);
    }

    /**
     * Get unittypes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnittypes()
    {
        return $this->unittypes;
    }
}
