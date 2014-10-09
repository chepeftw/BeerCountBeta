<?php

namespace FTW\BeerCountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Count
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FTW\BeerCountBundle\Entity\CountRepository")
 */
class Count
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
     * @ORM\ManyToOne(targetEntity="Bar", inversedBy="counts")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id")
     */
    protected $bar;

    /**
     * @ORM\ManyToOne(targetEntity="Friend", inversedBy="counts")
     * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
     */
    protected $friend;


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
     * Set bar
     *
     * @param \FTW\BeerCountBundle\Entity\Bar $bar
     * @return Count
     */
    public function setBar(\FTW\BeerCountBundle\Entity\Bar $bar = null)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return \FTW\BeerCountBundle\Entity\Bar 
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set friend
     *
     * @param \FTW\BeerCountBundle\Entity\Friend $friend
     * @return Count
     */
    public function setFriend(\FTW\BeerCountBundle\Entity\Friend $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \FTW\BeerCountBundle\Entity\Friend 
     */
    public function getFriend()
    {
        return $this->friend;
    }
}
