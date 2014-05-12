<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Nation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\NationRepository")
 */
class Nation
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
	 * @ORM\OneToMany(targetEntity="Unit", mappedBy="nation")
	 */
	private $units;

	/**
	 * @ORM\ManyToOne(targetEntity="Alliance", inversedBy="nations")
	 * @ORM\JoinColumn(name="alliance_id", referencedColumnName="id")
	 */
	private $alliance;

	public function __construct()
	{
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
	 * @return Nation
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
	 * Add units
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
	 * @return Nation
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
	 * Set alliance
	 *
	 * @param \Pardalis\WaSUnitBundle\Entity\Alliance $alliance
	 * @return Nation
	 */
	public function setAlliance(\Pardalis\WaSUnitBundle\Entity\Alliance $alliance = null)
	{
		$this->alliance = $alliance;

		return $this;
	}

	/**
	 * Get alliance
	 *
	 * @return \Pardalis\WaSUnitBundle\Entity\Alliance 
	 */
	public function getAlliance()
	{
		return $this->alliance;
	}
}
