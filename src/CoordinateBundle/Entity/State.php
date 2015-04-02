<?php

namespace CoordinateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class State
{
    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     **/
    private $country;
    
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="state")
     **/
    private $addresses;
    
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=15)
     */
    private $code;


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
     * @return State
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
     * Set code
     *
     * @param string $code
     * @return State
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * Set addresses
     *
     * @param \Adress $addresses
     * @return State
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * Get addresses
     *
     * @return \Address 
     */
    public function getAddresses()
    {
        return $this->addresses ;
    }
    
    /**
     * Set Country
     *
     * @param \Country $country
     * @return State
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
}
