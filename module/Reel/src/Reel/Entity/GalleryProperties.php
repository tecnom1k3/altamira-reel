<?php
namespace Reel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Reel\Entity\Site;

/**
 * Sites
 *
 * @ORM\Table(name="galleryProperties")
 * @ORM\Entity
 */
class GalleryProperties
{
    /**
     * @var \Site
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Site", inversedBy="galleryProperties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="siteId", referencedColumnName="siteId")
     * })
     *
     */
    private $site;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="timed", type="integer", nullable=false)
     */
    private $timed;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="delay", type="integer", nullable=false)
     */
    private $delay;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="showCarrousel", type="integer", nullable=false)
     */
    private $showCarrousel;
    
    /**
     * @var string
     *
     * @ORM\Column(name="textShowCarrousel", type="string", length=45, nullable=false)
     */
    private $textShowCarrousel;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="showInfoPane", type="integer", nullable=false)
     */
    private $showInfopane;
    
	/**
     * @return the $site
     */
    public function getSite ()
    {
        return $this->site;
    }

	/**
     * @param field_type $site
     */
    public function setSite ($site)
    {
        $this->site = $site;
    }

	/**
     * @return the $timed
     */
    public function getTimed ()
    {
        return $this->timed;
    }

	/**
     * @param boolean $timed
     */
    public function setTimed ($timed)
    {
        $this->timed = $timed;
    }

	/**
     * @return the $delay
     */
    public function getDelay ()
    {
        return $this->delay;
    }

	/**
     * @param number $delay
     */
    public function setDelay ($delay)
    {
        $this->delay = $delay;
    }

	/**
     * @return the $showCarrousel
     */
    public function getShowCarrousel ()
    {
        return $this->showCarrousel;
    }

	/**
     * @param boolean $showCarrousel
     */
    public function setShowCarrousel ($showCarrousel)
    {
        $this->showCarrousel = $showCarrousel;
    }

	/**
     * @return the $textShowCarrousel
     */
    public function getTextShowCarrousel ()
    {
        return $this->textShowCarrousel;
    }

	/**
     * @param string $textShowCarrousel
     */
    public function setTextShowCarrousel ($textShowCarrousel)
    {
        $this->textShowCarrousel = $textShowCarrousel;
    }

	/**
     * @return the $showInfopane
     */
    public function getShowInfopane ()
    {
        return $this->showInfopane;
    }

	/**
     * @param boolean $showInfopane
     */
    public function setShowInfopane ($showInfopane)
    {
        $this->showInfopane = $showInfopane;
    }

}