<?php
namespace AdvertBundle\Controller;

use AdvertBundle\Form\AdvertType;
use CommonBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        $adverts = $this->get('advert.advert')->findAll();

        return $this->render('@Advert/Default/index.html.twig', [
            'adverts' => $adverts,
        ]);
    }

    public function addAction(Request $request)
    {
        $form = $this->getFF()->create(new AdvertType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();
            $this->getDm()->persist($advert);
            $this->getDm()->flush();

            return $this->redirect($this->get('router')->generate(''));
        }

        return
            $this->render('@Advert/Default/add.html.twig',
                [
                    'form' => $form->createView(),
                ]);

    }
}
