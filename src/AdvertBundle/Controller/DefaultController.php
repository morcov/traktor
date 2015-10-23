<?php
namespace AdvertBundle\Controller;

use AdvertBundle\Document\Advert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $advert = new Advert();
        $advert->setName('Traktor');
        $advert->setDescription('Buy Traktor');
        $advert->setPrice(80000);

        $m = $this->container->get('doctrine.odm.mongodb.document_manager');
        $m->persist($advert);
        $m->flush();

        var_dump($advert);
        return new Response(33);
    }
}
