<?php

use CatalogBundle\Document\Make;
use CatalogBundle\Document\Model;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MakeLoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $make = new Make();
        $make->setName('Porsche');

        $model = new Model();
        $model->setName('SS-15');
        $model->setMake($make);
        $manager->persist($model);

        $model = new Model();
        $model->setName('SS-17');
        $model->setMake($make);
        $manager->persist($model);

        $model = new Model();
        $model->setName('SS-19');
        $model->setMake($make);
        $manager->persist($model);
        $manager->persist($make);


        $make = new Make();
        $make->setName('Daewoo');

        $model = new Model();
        $model->setName('K1');
        $model->setMake($make);
        $manager->persist($model);

        $model = new Model();
        $model->setName('K2');
        $model->setMake($make);
        $manager->persist($model);

        $model = new Model();
        $model->setName('K3');
        $model->setMake($make);
        $manager->persist($model);

        $model = new Model();
        $model->setName('K4');
        $model->setMake($make);
        $manager->persist($model);
        $manager->persist($make);

        $manager->flush();
    }
}