<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AdvertRepository extends DocumentRepository
{

    public function getByPrice($price)
    {
        return 44;
        $query = $this->createQueryBuilder()
            ->field('name')->equals('Traktor')
            ->getQuery();

        return $query->getSingleResult();
    }

}