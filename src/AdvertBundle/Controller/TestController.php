<?php
namespace AdvertBundle\Controller;

use CatalogBundle\Document\Make;
use CatalogBundle\Document\Model;
use CommonBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends BaseController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $makes = $this->get('catalog.make_repository')->findAll();
        $models = $this->get('catalog.model_repository')->findAll();


        return $this->render('AdvertBundle:Test:detail.html.twig', [
            'makes' => $makes,
            'models' => $models,
        ]);
    }
}
