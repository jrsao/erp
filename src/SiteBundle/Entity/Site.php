<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use CoordinateBundle\Entity\Address;
use CoordinateBundle\Entity\PhoneNumber;

/**
 * Site
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\SiteRepository")
 */
class Site
{
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="site")
     **/
    private $addresses;
    
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\PhoneNumber", mappedBy="site")
     **/
    private $phoneNumbers;
    
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

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->phoneNumbers = new ArrayCollection();
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
     * @return Site
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
     * getDefaultAddress
     * 
     * @return Address
     */
    public function getDefaultAddress()
    {
        $addresses = $this->getAddresses();
       
        if (sizeof($addresses) > 0) {
            return (string)$addresses[0];
        }
        
        return null;
    }
    
    
    /**
     * Add address
     *
     * @param \Adress $address
     * @return Site
     */
    public function addAddress(Address $address)
    {
        $address->setSite($this);
        $this->addresses[] = $address;
        
        return $this;
    }
    
    /**
     * remove address
     *
     * @param \Adress $address
     * @return Site
     */
    public function removeAddress(Address $address)
    {
        $this->addresses->removeElement($address);
        
        return $this;
    }
    
    /**
     * Set addresses
     *
     * @param \Adress $addresses
     * @return Site
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
     * Add phoneNumber
     *
     * @param \Adress $phoneNumber
     * @return Site
     */
    public function addPhoneNumber(PhoneNumber $phoneNumber)
    {
        $phoneNumber->setSite($this);
        $this->phoneNumbers[] = $phoneNumber;
        
        return $this;
    }
    
    /**
     * remove phoneNumber
     *
     * @param \Adress $phoneNumber
     * @return Site
     */
    public function removePhoneNumber(PhoneNumber $phoneNumber)
    {
        $this->phoneNumbers->removeElement($phoneNumber);
        
        return $this;
    }
    
    /**
     * Set phoneNumbers
     *
     * @param \Adress $phoneNumbers
     * @return Site
     */
    public function setPhoneNumbers($phoneNumbers)
    {
        $this->phoneNumbers = $phoneNumbers;

        return $this;
    }

    /**
     * Get phoneNumbers
     *
     * @return \PhoneNumber 
     */
    public function getPhoneNumbers()
    {
        return $this->phoneNumbers ;
    }
}
