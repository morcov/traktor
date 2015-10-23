<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="AdvertBundle\Document\AdvertRepository")
 */
class Advert
{
    /**
     * @var int
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @var string
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     * @var
     */
    protected $description;

    /**
     * @MongoDB\Float
     * @var
     */
    protected $price;
}