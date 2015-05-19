<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SiteBundle\Entity\Space;
use SiteBundle\Entity\Site;

/**
 * SpaceType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\SpaceTypeRepository")
 */
class SpaceType
{
    /**
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="spaceTypes", cascade={"persist"})
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     **/
    private $site;
    
    /**
     * @ORM\OneToMany(targetEntity="Space", mappedBy="spaceType")
     **/
    private $spaces;
    
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="suggestedPrice", type="decimal")
     */
    private $suggestedPrice;

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
     * Set description
     *
     * @param string $description
     * @return SpaceType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set suggestedPrice
     *
     * @param string $suggestedPrice
     * @return SpaceType
     */
    public function setSuggestedPrice($suggestedPrice)
    {
        $this->suggestedPrice = $suggestedPrice;

        return $this;
    }

    /**
     * Get suggestedPrice
     *
     * @return string 
     */
    public function getSuggestedPrice()
    {
        return $this->suggestedPrice;
    }

    /**
     * Set spacesType
     *
     * @param integer $spacesType
     * @return SpaceType
     */
    public function setSiteId($spacesType)
    {
        $this->spacesType = $spacesType;

        return $this;
    }

    /**
     * Get spacesType
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->spacesType;
    }
    
    /**
     * Add spaces
     *
     * @param \Adress $spaces
     * @return SpaceType
     */
    public function addSpaces(Space $spaces)
    {
        $spaces->setSpaceType($this);
        $this->spaces[] = $spaces;
        
        return $this;
    }
    
    /**
     * remove spaces
     *
     * @param \Space $spaces
     * @return SpaceType
     */
    public function removeSpaces(Space $spaces)
    {
        $this->spaces->removeElement($spaces);
        
        return $this;
    }
    
    /**
     * Set spaces
     *
     * @param \Space $spaces
     * @return SpaceType
     */
    public function setSpaces(Space $spaces)
    {
        $this->spaces = $spaces;

        return $this;
    }

    /**
     * Get spaces
     *
     * @return \Spaces 
     */
    public function getSpaces()
    {
        return $this->spaces ;
    }
 
    /**
     * Set site
     *
     * @param \Space $site
     * @return SpaceType
     */
    public function setSite(Site $site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \site 
     */
    public function getSite()
    {
        return $this->site ;
    }
}
