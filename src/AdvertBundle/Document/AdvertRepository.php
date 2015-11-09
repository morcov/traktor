<?php
namespace AdvertBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class AdvertRepository extends DocumentRepository
{

    public function findBySlug($slug)
    {
        $query = $this->createQueryBuilder()
            ->field('slug')->equals($slug);

        return $query->getQuery()->getSingleResult();
    }

    public function search($params)
    {
        $query = $this->createQueryBuilder();

        if (!empty($params['year_from'])) {
            $query->field('year')->gte((int)$params['year_from']);
        }

        if (!empty($params['year_to'])) {
            $query->field('year')->lte((int)$params['year_to']);
        }

        if (!empty($params['price_from'])) {
            $query->field('price')->gte((int)$params['price_from']);
        }

        if (!empty($params['price_to'])) {
            $query->field('price')->lte((int)$params['price_to']);
        }

        if (!empty($params['make'])) {
            $query->field('make.id')->equals($params['make']->getId());
        }

        if (!empty($params['model'])) {
            $query->field('model.id')->equals($params['model']->getId());
        }

        return $query->getQuery()->execute();
    }

}