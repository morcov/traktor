<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class ModelRepository extends DocumentRepository
{

    public function createModelsByMakeQuery($makeID)
    {
        $query = $this->createQueryBuilder()
            ->field('make.id')->equals($makeID);

        return $query;
    }

    public function getModelsByMake($makeID)
    {
        return $this->createModelsByMakeQuery($makeID)->getQuery()->execute();
    }

}