<?php
namespace AdvertBundle\Controller;

use AdvertBundle\Document\Make;
use AdvertBundle\Document\Model;
use CommonBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends BaseController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
//        $make = new Make();
//        $make->setName('Porsche');
//
//        $model = new Model();
//        $model->setName('SS-15');
//        $model->setMake($make);
//        $this->getDm()->persist($model);
//
//        $model = new Model();
//        $model->setName('SS-17');
//        $model->setMake($make);
//        $this->getDm()->persist($model);
//
//        $model = new Model();
//        $model->setName('SS-19');
//        $model->setMake($make);
//        $this->getDm()->persist($model);
//
//        $this->getDm()->persist($make);
//
//
//        $this->getDm()->flush();

        $makes = $this->get('advert.make')->findAll();
        $models = $this->get('advert.model')->findAll();


        return $this->render('AdvertBundle:Test:detail.html.twig', [
            'makes' => $makes,
            'models' => $models,
        ]);
    }
}
