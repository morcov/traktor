<?php

namespace AdvertBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\Document(
 * collection="advert",
 * repositoryClass="AdvertBundle\Document\AdvertRepository"
 * )
 */
class Advert
{
    /**
     * @var string
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @Assert\NotNull
     * @MongoDB\ReferenceOne(targetDocument="AdvertBundle\Document\Make")
     */
    protected $make;

    /**
     * @Assert\NotNull
     * @MongoDB\ReferenceOne(targetDocument="AdvertBundle\Document\Model")
     */
    protected $model;

    /**
     * @Assert\NotNull
     * @Assert\Range(min="1900")
     * @MongoDB\Integer
     * @var int
     */
    protected $year;

    /**
     * @MongoDB\Boolean
     * @var boolean
     */
    protected $is_new;

    /**
     * @var string
     * @Gedmo\Slug(fields={"description"})
     * @MongoDB\String
     */
    protected $slug;

    /**
     * @var string
     * @Assert\NotNull
     * @MongoDB\String
     */
    protected $description;

    /**
     * @var int
     * @Assert\NotNull
     * @Assert\Range(min="10")
     * @MongoDB\Integer
     */
    protected $price;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param string $make
     * @return $this
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return $this
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsNew()
    {
        return $this->is_new;
    }

    /**
     * @param boolean $is_new
     * @return $this
     */
    public function setIsNew($is_new)
    {
        $this->is_new = $is_new;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }




}