<?php

namespace AdvertBundle\Controller;

use AdvertBundle\Document\Advert;
use AdvertBundle\Form\AdvertType;
use CommonBundle\Controller\BaseController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends BaseController
{


    /**
     * @param Request $request
     * @param null $id
     * @return RedirectResponse|Response
     */
    public function indexAction(Request $request, $id = null)
    {
        $advert = $this->get('advert.advert_repository')->find($id);
        $form = $this->createForm(new AdvertType(), $advert ?: new Advert());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();
            $this->getDm()->persist($advert);
            $this->getDm()->flush();

            $url = $this->get('router')->generate('advert_detail_page', ['slug' => $advert->getSlug()]);
            return $this->redirect($url);
        }

        return $this->render('@Advert/Advert/index.html.twig', [
            'form' => $form->createView(),
            'advert' => $advert,
        ]);

    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getModelsByMakeAction(Request $request)
    {
        $makeID = $request->request->get('make');
        $modelID = $request->request->get('model');

        $models = $this->get('advert.model_repository')->getModelsByMake($makeID);

        return $this->render('@Advert/select.html.twig', ['array' => $models, 'model' => $modelID]);
    }

}
