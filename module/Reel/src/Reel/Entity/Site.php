<?php
namespace Reel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Reel\Entity\Image;

/**
 * Sites
 *
 * @ORM\Table(name="sites")
 * @ORM\Entity
 */
class Site 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="siteId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $siteId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="domain", type="string", length=255, nullable=false)
     */
    private $domain;
    
    /**
     * @var string
     *
     * @ORM\Column(name="apiKey", type="string", length=45, nullable=false)
     */
    private $apiKey;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = 0;
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="site")
     * @var Collection
     */
    private $images;
    
	/**
     * @return the $siteId
     */
    public function getSiteId ()
    {
        return $this->siteId;
    }

	/**
     * @return the $domain
     */
    public function getDomain ()
    {
        return $this->domain;
    }

	/**
     * @return the $apiKey
     */
    public function getApiKey ()
    {
        return $this->apiKey;
    }

	/**
     * @return the $status
     */
    public function getStatus ()
    {
        return $this->status;
    }

	/**
     * @param number $siteId
     */
    public function setSiteId ($siteId)
    {
        $this->siteId = $siteId;
    }

	/**
     * @param string $domain
     */
    public function setDomain ($domain)
    {
        $this->domain = $domain;
    }

	/**
     * @param string $apiKey
     */
    public function setApiKey ($apiKey)
    {
        $this->apiKey = $apiKey;
    }

	/**
     * @param boolean $status
     */
    public function setStatus ($status)
    {
        $this->status = $status;
    }
    
	/**
     * @return Collection
     */
    public function getImages ()
    {
        return $this->images;
    }
    
    /**
     * 
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $this->images->add($image);
        $image->setSite($this);
    }


}