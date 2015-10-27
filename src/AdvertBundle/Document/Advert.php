<?php

namespace AdvertBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

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
     * @var string
     * @Assert\NotNull
     * @MongoDB\String
     */
    protected $make;

    /**
     * @var string
     * @Assert\NotNull
     * @MongoDB\String
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
     */
    public function setMake($make)
    {
        $this->make = $make;
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
     */
    public function setModel($model)
    {
        $this->model = $model;
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
     */
    public function setYear($year)
    {
        $this->year = $year;
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
     */
    public function setIsNew($is_new)
    {
        $this->is_new = $is_new;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }




}