<?php

namespace FTW\BeerCountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friend
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FTW\BeerCountBundle\Entity\FriendRepository")
 */
class Friend
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=255)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="favoriteBeer", type="string", length=255)
     */
    private $favoriteBeer;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @ORM\OneToMany(targetEntity="Count", mappedBy="friend")
     */
    protected $counts;


    public function __toString() {
        return $this->nickname;
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
     * @return Friend
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
     * Set email
     *
     * @param string $email
     * @return Friend
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return Friend
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set favoriteBeer
     *
     * @param string $favoriteBeer
     * @return Friend
     */
    public function setFavoriteBeer($favoriteBeer)
    {
        $this->favoriteBeer = $favoriteBeer;

        return $this;
    }

    /**
     * Get favoriteBeer
     *
     * @return string 
     */
    public function getFavoriteBeer()
    {
        return $this->favoriteBeer;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->counts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Friend
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Add counts
     *
     * @param \FTW\BeerCountBundle\Entity\Count $counts
     * @return Friend
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
