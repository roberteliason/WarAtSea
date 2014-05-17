<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Unit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\UnitRepository")
 */
class Unit
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
	 * @var integer
	 *
	 * @ORM\Column(name="year", type="integer")
	 */
	private $year;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="cost", type="integer")
	 */
	private $cost;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="speed", type="string", length=2)
	 */
	private $speed;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="flags", type="integer")
	 */
	private $flags;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="aircraft", type="integer")
	 */
	private $aircraft;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="armor", type="integer")
	 */
	private $armor;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="vital_armor", type="integer")
	 */
	private $vital_armor;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="hull_points", type="integer")
	 */
	private $hull_points;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="number_in_set", type="integer")
	 */
	private $number_in_set;

	/**
	 * @ORM\ManyToOne(targetEntity="Nation", inversedBy="units")
	 * @ORM\JoinColumn(name="nation_id", referencedColumnName="id")
	 */
	private $nation;

	/**
	 * @ORM\OneToMany(targetEntity="Attack", mappedBy="unit")
	 */
	private $attacks;

	/**
	 * @ORM\ManyToOne(targetEntity="ReleaseSet", inversedBy="units")
	 * @ORM\JoinColumn(name="releaseset_id", referencedColumnName="id")
	 */
	private $releaseset;

	/**
	 * @ORM\ManyToOne(targetEntity="Rarity", inversedBy="units")
	 * @ORM\JoinColumn(name="rarity_id", referencedColumnName="id")
	 */
	private $rarity;

	/**
	 * @ORM\ManyToOne(targetEntity="UnitType", inversedBy="units")
	 * @ORM\JoinColumn(name="unittype_id", referencedColumnName="id")
	 */
	private $unittype;

	/**
	 * @ORM\ManyToMany(targetEntity="Ability", inversedBy="units")
	 * @ORM\JoinTable(name="unit_abilities")
	 */
	private $abilities;

	public function __construct()
	{
		$this->attacks = new ArrayCollection();
		$this->abilities = new ArrayCollection();
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
	 * @return Unit
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
	 * Set cost
	 *
	 * @param integer $cost
	 * @return Unit
	 */
	public function setCost($cost)
	{
		$this->cost = $cost;

		return $this;
	}

	/**
	 * Get cost
	 *
	 * @return integer 
	 */
	public function getCost()
	{
		return $this->cost;
	}
	
	/**
	 * Set nation
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Nation $nation
	 * @return Unit
	 */
	public function setNation(\Pardalis\WaSUnitBundle\Entity\Nation $nation = null)
	{
		$this->nation = $nation;

		return $this;
	}

	/**
	 * Get nation
	 *
	 * @return \Pardalis\WaSUnitBundle\Entity\Nation 
	 */
	public function getNation()
	{
		return $this->nation;
	}

	/**
	 * Add attacks
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Attack $attacks
	 * @return Unit
	 */
	public function addAttack(\Pardalis\WaSUnitBundle\Entity\Attack $attacks)
	{
		$this->attacks[] = $attacks;

		return $this;
	}

	/**
	 * Remove attacks
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Attack $attacks
	 */
	public function removeAttack(\Pardalis\WaSUnitBundle\Entity\Attack $attacks)
	{
		$this->attacks->removeElement($attacks);
	}

	/**
	 * Get attacks
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getAttacks()
	{
		return $this->attacks;
	}

	/**
	 * Set releaseset
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\ReleaseSet $releaseset
	 * @return Unit
	 */
	public function setReleaseset(\Pardalis\WaSUnitBundle\Entity\ReleaseSet $releaseset = null)
	{
		$this->releaseset = $releaseset;

		return $this;
	}

	/**
	 * Get releaseset
	 *
	 * @return \Pardalis\WaSUnitBundle\Entity\ReleaseSet 
	 */
	public function getReleaseset()
	{
		return $this->releaseset;
	}

	/**
	 * Set unittype
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\UnitType $unittype
	 * @return Unit
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

	/**
	 * Set speed
	 *
	 * @param string $speed
	 * @return Unit
	 */
	public function setSpeed($speed)
	{
		$this->speed = $speed;

		return $this;
	}

	/**
	 * Get speed
	 *
	 * @return string 
	 */
	public function getSpeed()
	{
		return $this->speed;
	}

	/**
	 * Set rarity
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Rarity $rarity
	 * @return Unit
	 */
	public function setRarity(\Pardalis\WaSUnitBundle\Entity\Rarity $rarity = null)
	{
		$this->rarity = $rarity;

		return $this;
	}

	/**
	 * Get rarity
	 *
	 * @return \Pardalis\WaSUnitBundle\Entity\Rarity 
	 */
	public function getRarity()
	{
		return $this->rarity;
	}

	/**
	 * Set armor
	 *
	 * @param integer $armor
	 * @return Unit
	 */
	public function setArmor($armor)
	{
		$this->armor = $armor;

		return $this;
	}

	/**
	 * Get armor
	 *
	 * @return integer 
	 */
	public function getArmor()
	{
		return $this->armor;
	}

	/**
	 * Set vital_armor
	 *
	 * @param integer $vitalArmor
	 * @return Unit
	 */
	public function setVitalArmor($vitalArmor)
	{
		$this->vital_armor = $vitalArmor;

		return $this;
	}

	/**
	 * Get vital_armor
	 *
	 * @return integer 
	 */
	public function getVitalArmor()
	{
		return $this->vital_armor;
	}

	/**
	 * Set hull_points
	 *
	 * @param integer $hullPoints
	 * @return Unit
	 */
	public function setHullPoints($hullPoints)
	{
		$this->hull_points = $hullPoints;

		return $this;
	}

	/**
	 * Get hull_points
	 *
	 * @return integer 
	 */
	public function getHullPoints()
	{
		return $this->hull_points;
	}

    /**
     * Add abilities
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Ability $abilities
     * @return Unit
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
     * Set flags
     *
     * @param integer $flags
     * @return Unit
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * Get flags
     *
     * @return integer 
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * Set aircraft
     *
     * @param integer $aircraft
     * @return Unit
     */
    public function setAircraft($aircraft)
    {
        $this->aircraft = $aircraft;

        return $this;
    }

    /**
     * Get aircraft
     *
     * @return integer 
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Unit
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set number_in_set
     *
     * @param integer $numberInSet
     * @return Unit
     */
    public function setNumberInSet($numberInSet)
    {
        $this->number_in_set = $numberInSet;

        return $this;
    }

    /**
     * Get number_in_set
     *
     * @return integer 
     */
    public function getNumberInSet()
    {
        return $this->number_in_set;
    }
}
