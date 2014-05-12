<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Rarity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\RarityRepository")
 */
class Rarity
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
	 * @ORM\Column(name="Name", type="string", length=32)
	 */
	private $name;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="SortOrder", type="integer")
	 */
	private $sortOrder;

	/**
	 * @ORM\OneToMany(targetEntity="Unit", mappedBy="rarity")
	 */
	private $units;

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
	 * @return Rarity
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
	 * @return Rarity
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
     * Add units
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
     * @return Rarity
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
