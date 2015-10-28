<?php

namespace AdvertBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(
 * collection="make",
 * repositoryClass="AdvertBundle\Document\MakeRepository"
 * )
 */
class Make
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
    protected $name;

    /**
     * @MongoDB\ReferenceMany(targetDocument="AdvertBundle\Document\Model", mappedBy="make")
     */
    protected $models;

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

    /**
     * @return mixed
     */
    public function getModels()
    {
        return $this->models;
    }



}