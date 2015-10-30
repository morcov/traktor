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
        $makes = $this->get('advert.make_repository')->findAll();
        $models = $this->get('advert.model_repository')->findAll();


        return $this->render('AdvertBundle:Test:detail.html.twig', [
            'makes' => $makes,
            'models' => $models,
        ]);
    }
}
