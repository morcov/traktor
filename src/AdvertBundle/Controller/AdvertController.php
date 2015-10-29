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
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $form = $this->make($request);

        if (!($form instanceof Form)) {
            return $this->redirect($form);
        }

        return $this->render('@Advert/Advert/add.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $id)
    {
        $advert = $this->get('advert.advert')->find($id);
        $form = $this->make($request, $advert);

        if (!($form instanceof Form)) {
            return $this->redirect($form);
        }

        return $this->render('@Advert/Advert/edit.html.twig', [
            'form' => $form->createView(),
            'advert' => $advert,
        ]);
    }

    /**
     * @param $request
     * @param null $advert
     * @return string|Form
     */
    private function make($request, $advert = null)
    {
        $form = $this->getFF()->create(new AdvertType(), $advert ?: new Advert());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();
            $this->getDm()->persist($advert);
            $this->getDm()->flush();

            return $this->get('router')->generate('advert_detail_page', ['id' => $advert->getId()]);
        }

        return $form;
    }
}
