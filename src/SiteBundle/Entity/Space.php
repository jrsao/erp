<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\SpaceType;

/**
 * Space
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\SpaceRepository")
 */
class Space
{
    /**
     * @ORM\OneToOne(targetEntity="Unit", mappedBy="space")
     **/
   protected $unit;
       
   /**
     * @ORM\OneToOne(targetEntity="Parking", mappedBy="space")
     **/
   protected $parking;
   
    /**
     * @ORM\ManyToOne(targetEntity="SpaceType", inversedBy="spaces", cascade={"persist"})
     * @ORM\JoinColumn(name="space_type_id", referencedColumnName="id")
     **/
    private $spaceType;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;

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
     * Set available
     *
     * @param boolean $available
     * @return Space
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set spaceType
     *
     * @param integer $spaceType
     * @return Space
     */
    public function setSpaceType(SpaceType $spaceType)
    {
        $this->spaceType = $spaceType;

        return $this;
    }

    /**
     * Get spaceType
     *
     * @return integer 
     */
    public function getSpaceType()
    {
        return $this->spaceType;
    }
    
    /**
     * Set unit
     *
     * @param boolean $unit
     * @return Space
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return boolean 
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Set parking
     *
     * @param boolean $parking
     * @return Space
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return boolean 
     */
    public function getParking()
    {
        return $this->parking;
    }
}
