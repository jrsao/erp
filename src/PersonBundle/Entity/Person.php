<?php

namespace PersonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PersonBundle\Entity\Client;
use CoordinateBundle\Entity\Address;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PersonBundle\Entity\PersonRepository")
 */
class Person
{
    /**
     * @ORM\OneToMany(targetEntity="CoordinateBundle\Entity\Address", mappedBy="person")
     **/
    private $addresses;
    
    /**
     * @ORM\OneToOne(targetEntity="Client", mappedBy="person")
     **/
   protected $client;
    
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime")
     */
    private $birthday;


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
     * Set firstName
     *
     * @param string $firstName
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Person
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    /**
     * Set client
     *
     * @param \Client $client
     * @return Person
     */
    public function setClient(Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    
    /**
     * Set addresses
     *
     * @param \Adress $addresses
     * @return Person
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
}
