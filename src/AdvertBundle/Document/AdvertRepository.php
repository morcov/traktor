<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AdvertRepository extends DocumentRepository
{

    public function search($params)
    {
        $query = $this->createQueryBuilder()
//            ->field('name')->equals('Traktor')
            ->getQuery();

        return $query->execute();
    }

}