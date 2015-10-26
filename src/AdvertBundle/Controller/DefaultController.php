<?php
namespace AdvertBundle\Controller;

use CommonBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
//        $advert = new Advert();
//        $advert->setName('Traktor');
//        $advert->setDescription('Buy Traktor');
//        $advert->setPrice(80000);
//
//        $m = $this->getDM();
//        $m->persist($advert);
//        $m->flush();

//        $repository = ;

        $adverts = $this->get('advert.advert')->findAll();

        return $this->render('@Advert/Default/index.html.twig', [
            'adverts' => $adverts,
        ]);
    }
}
