<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Space;

/**
 * Unit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\UnitRepository")
 */
class Unit extends Space
{
    /**
     * @ORM\OneToOne(targetEntity="Space", inversedBy="unit", cascade={"persist"})
     * @ORM\JoinColumn(name="space_id", referencedColumnName="id")
     **/
    protected $space;
    
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
     * @return Unit
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
     * Set space
     *
     * @param \Space $space
     * @return Unit
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
