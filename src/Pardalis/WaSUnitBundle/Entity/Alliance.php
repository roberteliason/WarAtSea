<?php

namespace Pardalis\WaSUnitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Alliance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Pardalis\WaSUnitBundle\Entity\AllianceRepository")
 */
class Alliance
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
     * @ORM\OneToMany(targetEntity="Nation", mappedBy="alliance")
     */
    private $nations;

    public function __construct()
    {
        $this->nations = new ArrayCollection();
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
     * @return Alliance
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
     * Add nations
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Nation $nations
     * @return Alliance
     */
    public function addNation(\Pardalis\WaSUnitBundle\Entity\Nation $nations)
    {
        $this->nations[] = $nations;

        return $this;
    }

    /**
     * Remove nations
     *
     * @param \Pardalis\WaSUnitBundle\Entity\Nation $nations
     */
    public function removeNation(\Pardalis\WaSUnitBundle\Entity\Nation $nations)
    {
        $this->nations->removeElement($nations);
    }

    /**
     * Get nations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNations()
    {
        return $this->nations;
    }
}
