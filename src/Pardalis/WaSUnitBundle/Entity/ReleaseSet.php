<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ReleaseSet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\ReleaseSetRepository")
 */
class ReleaseSet
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
     * @var string
     *
     * @ORM\Column(name="popular_name", type="string", length=128)
     */
    private $popularName;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalunits", type="integer")
     */
    private $totalUnits;

    /**
     * @ORM\OneToMany(targetEntity="Unit", mappedBy="releaseset")
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
     * @return ReleaseSet
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
     * Set units
     *
     * @param integer $units
     * @return ReleaseSet
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units
     *
     * @return integer 
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set popularName
     *
     * @param string $popularName
     * @return ReleaseSet
     */
    public function setPopularName($popularName)
    {
        $this->popularName = $popularName;

        return $this;
    }

    /**
     * Get popularName
     *
     * @return string 
     */
    public function getPopularName()
    {
        return $this->popularName;
    }

    /**
     * Add units
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Unit $units
     * @return ReleaseSet
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
     * Set totalUnits
     *
     * @param integer $totalUnits
     * @return ReleaseSet
     */
    public function setTotalUnits($totalUnits)
    {
        $this->totalUnits = $totalUnits;

        return $this;
    }

    /**
     * Get totalUnits
     *
     * @return integer 
     */
    public function getTotalUnits()
    {
        return $this->totalUnits;
    }
}
