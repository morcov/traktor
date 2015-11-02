<?php

namespace SearchBundle\Controller;

use CommonBundle\Controller\BaseController;
use SearchBundle\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends BaseController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $form = $this->createForm(new SearchType());

        return $this->render('SearchBundle:Search:index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getAdvertsAction(Request $request)
    {
        $params = $request->request->get('search_bundle_search');
        var_dump($params);

        $adverts = $this->get('advert.advert_repository')->search($params);

        return $this->render('@Search/Search/adverts.html.twig', [
            'adverts' => $adverts,
        ]);
    }
}
