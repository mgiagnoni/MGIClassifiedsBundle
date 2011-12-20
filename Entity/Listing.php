<?php

/*
 * This file is part of the AcmeClassifiedsBundle package.
 *
 * Copyright 2011 Massimo Giagnoni <gimassimo@gmail.com>
 *
 * This source file is subject to the MIT license. Full copyright and license
 * information are in the LICENSE file distributed with this source code.
 */

namespace Acme\ClassifiedsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acme\ClassifiedsBundle\Entity\Listing
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\ClassifiedsBundle\Entity\ListingRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Listing
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $ad_title
     *
     * @ORM\Column(name="ad_title", type="string", length=255)
     */
    private $ad_title;

    /**
     * @var text $ad_text
     *
     * @ORM\Column(name="ad_text", type="text")
     */
    private $ad_text;

    /**
     * @var datetime $posted_at
     *
     * @ORM\Column(name="posted_at", type="datetime")
     */
    private $posted_at;

    /**
     * @var datetime $expires_at
     *
     * @ORM\Column(name="expires_at", type="datetime")
     */
    private $expires_at;

    /**
     * @var boolean $published
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category;

    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
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
     * Set ad_title
     *
     * @param string $adTitle
     */
    public function setAdTitle($adTitle)
    {
        $this->ad_title = $adTitle;
    }

    /**
     * Get ad_title
     *
     * @return string
     */
    public function getAdTitle()
    {
        return $this->ad_title;
    }

    /**
     * Set ad_text
     *
     * @param text $adText
     */
    public function setAdText($adText)
    {
        $this->ad_text = $adText;
    }

    /**
     * Get ad_text
     *
     * @return text
     */
    public function getAdText()
    {
        return $this->ad_text;
    }

    /**
     * Set posted_at
     *
     * @param datetime $postedAt
     */
    public function setPostedAt($postedAt)
    {
        $this->posted_at = $postedAt;
    }

    /**
     * Get posted_at
     *
     * @return datetime
     */
    public function getPostedAt()
    {
        return $this->posted_at;
    }

    /**
     * Set expires_at
     *
     * @param datetime $expiresAt
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expires_at = $expiresAt;
    }

    /**
     * Get expires_at
     *
     * @return datetime
     */
    public function getExpiresAt()
    {
        return $this->expires_at;
    }

    /**
     * Set published
     *
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @ORM\prePersist
     */
    public function createPostedAtValue()
    {
        $this->posted_at = new \DateTime();
    }
}
