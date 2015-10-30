<?php
namespace CatalogBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class MakeRepository extends DocumentRepository
{

    /**
     * @return Make
     */
    public function findFirst()
    {
        $qb = $this->createQueryBuilder();

        return $qb->getQuery()->getSingleResult();
    }
}