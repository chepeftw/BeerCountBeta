<?php

namespace FTW\BeerCountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bar
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FTW\BeerCountBundle\Entity\BarRepository")
 */
class Bar
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="Count", mappedBy="bar")
     */
    protected $counts;

    public function __toString() {
        return $this->name;
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
     * @return Bar
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
     * Set description
     *
     * @param string $description
     * @return Bar
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
     * Set location
     *
     * @param string $location
     * @return Bar
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->counts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add counts
     *
     * @param \FTW\BeerCountBundle\Entity\Count $counts
     * @return Bar
     */
    public function addCount(\FTW\BeerCountBundle\Entity\Count $counts)
    {
        $this->counts[] = $counts;

        return $this;
    }

    /**
     * Remove counts
     *
     * @param \FTW\BeerCountBundle\Entity\Count $counts
     */
    public function removeCount(\FTW\BeerCountBundle\Entity\Count $counts)
    {
        $this->counts->removeElement($counts);
    }

    /**
     * Get counts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCounts()
    {
        return $this->counts;
    }
}
