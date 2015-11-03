<?php

namespace AdvertBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(
 * collection="model",
 * repositoryClass="AdvertBundle\Document\ModelRepository"
 * )
 */
class Model
{
    /**
     * @var string
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @var Make
     * @MongoDB\ReferenceOne(targetDocument="AdvertBundle\Document\Make", inversedBy="models")
     */
    protected $make;

    /**
     * @var string
     * @Assert\NotNull
     * @MongoDB\String
     */
    protected $name;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Make
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param Make $make
     */
    public function setMake($make)
    {
        $this->make = $make;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}