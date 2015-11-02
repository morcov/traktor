<?php
namespace CatalogBundle\Controller;

use CommonBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function getModelsByMakeAction(Request $request)
    {
        $makeID = $request->request->get('make');

        $models = $this->get('catalog.model_repository')->getModelsByMake($makeID);

        return $this->render('CatalogBundle::select.html.twig', ['array' => $models]);
    }
}
