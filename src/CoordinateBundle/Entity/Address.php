<?php

namespace CoordinateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Person;
use CoordinateBundle\Entity\Country;
use CoordinateBundle\Entity\State;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoordinateBundle\Entity\AddressRepository")
 */
class Address
{
    /**
     * @ORM\ManyToOne(targetEntity="State", inversedBy="address")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     **/
    private $state;
   
    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="address")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     **/
    private $country;
    
    /**
     * @ORM\ManyToOne(targetEntity="PersonBundle\Entity\Person", inversedBy="address")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     **/
    private $person;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="streetNumber", type="integer")
     */
    private $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=15)
     */
    private $zipCode;


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
     * Set streetNumber
     *
     * @param integer $streetNumber
     * @return Address
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return integer 
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
        
    /**
     * Set person
     *
     * @param \Person $person
     * @return Address
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
            
    /**
     * Set Country
     *
     * @param \Country $country
     * @return Address
     */
    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Set State
     *
     * @param \State $state
     * @return Address
     */
    public function setState(State $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \State 
     */
    public function getState()
    {
        return $this->state;
    }
}
