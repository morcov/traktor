<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AdvertRepository extends DocumentRepository
{

    public function getByPrice($price)
    {
        $query = $this->createQueryBuilder()
            ->field('price')->equals($price)
            ->getQuery();

        return $query->getSingleResult();
    }

}