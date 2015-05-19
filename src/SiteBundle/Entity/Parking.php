<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Space;
use SiteBundle\Entity\Vehicule;

/**
 * Parking
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\ParkingRepository")
 */
class Parking extends Space
{    
    /**
     * @ORM\OneToOne(targetEntity="Space", inversedBy="parking", cascade={"persist"})
     * @ORM\JoinColumn(name="space_id", referencedColumnName="id")
     **/
    protected $space;
    
    /**
     * @ORM\OneToMany(targetEntity="Vehicule", mappedBy="parking")
     **/
    private $vehicules;
    
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
     * @ORM\Column(name="no", type="string", length=255)
     */
    private $no;


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
     * Set no
     *
     * @param string $no
     * @return Parking
     */
    public function setNo($no)
    {
        $this->no = $no;

        return $this;
    }

    /**
     * Get no
     *
     * @return string 
     */
    public function getNo()
    {
        return $this->no;
    }
    
    /**
     * Add vehicules
     *
     * @param \Adress $vehicules
     * @return VehiculeType
     */
    public function addVehicules(Vehicule $vehicules)
    {
        $vehicules->setParking($this);
        $this->vehicules[] = $vehicules;
        
        return $this;
    }
    
    /**
     * remove vehicules
     *
     * @param \Vehicule $vehicules
     * @return VehiculeType
     */
    public function removeVehicules(Vehicule $vehicules)
    {
        $this->vehicules->removeElement($vehicules);
        
        return $this;
    }
    
    /**
     * Set vehicules
     *
     * @param \Vehicule $vehicules
     * @return VehiculeType
     */
    public function setVehicules(Vehicule $vehicules)
    {
        $this->vehicules = $vehicules;

        return $this;
    }

    /**
     * Get vehicules
     *
     * @return \Vehicules 
     */
    public function getVehicules()
    {
        return $this->vehicules ;
    }
        
    /**
     * Set space
     *
     * @param \Space $space
     * @return Parking
     */
    public function setSpace(Space $space)
    {
        $this->space = $space;

        return $this;
    }

    /**
     * Get space
     *
     * @return \Space 
     */
    public function getSpace()
    {
        return $this->space;
    }
}
