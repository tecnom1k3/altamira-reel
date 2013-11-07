<?php
namespace Reel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Reel\Entity\Site;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="fk_images_sites_idx", columns={"siteId"})})
 * @ORM\Entity
 */
class Image
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="imageId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="href", type="string", length=45, nullable=true)
     */
    private $href;
    
    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=45, nullable=false)
     */
    private $file;
    
    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=45, nullable=false)
     */
    private $thumbnail;
    
    /**
     * @var \Site
     *
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="siteId", referencedColumnName="siteId")
     * })
     * 
     */
    private $site;
    
	/**
     * @return the $imageId
     */
    public function getImageId ()
    {
        return $this->imageId;
    }

	/**
     * @param number $imageId
     */
    public function setImageId ($imageId)
    {
        $this->imageId = $imageId;
    }

	/**
     * @return the $title
     */
    public function getTitle ()
    {
        return $this->title;
    }

	/**
     * @param string $title
     */
    public function setTitle ($title)
    {
        $this->title = $title;
    }

	/**
     * @return the $description
     */
    public function getDescription ()
    {
        return $this->description;
    }

	/**
     * @param string $description
     */
    public function setDescription ($description)
    {
        $this->description = $description;
    }

	/**
     * @return the $href
     */
    public function getHref ()
    {
        return $this->href;
    }

	/**
     * @param string $href
     */
    public function setHref ($href)
    {
        $this->href = $href;
    }

	/**
     * @return the $file
     */
    public function getFile ()
    {
        return $this->file;
    }

	/**
     * @param string $file
     */
    public function setFile ($file)
    {
        $this->file = $file;
    }

	/**
     * @return the $thumbnail
     */
    public function getThumbnail ()
    {
        return $this->thumbnail;
    }

	/**
     * @param string $thumbnail
     */
    public function setThumbnail ($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

	/**
     * @return the $siteid
     */
    public function getSite ()
    {
        return $this->siteid;
    }

	/**
     * @param Sites $site
     */
    public function setSite (Site $site)
    {
        $this->site = $site;
    }

   
    

    
}
