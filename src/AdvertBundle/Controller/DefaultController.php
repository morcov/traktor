<?php
namespace AdvertBundle\Controller;

use AdvertBundle\Document\Advert;
use CommonBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

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

        return new Response(33);
    }
}
