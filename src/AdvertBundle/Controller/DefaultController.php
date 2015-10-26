<?php
namespace AdvertBundle\Controller;

use AdvertBundle\Form\AdvertType;
use CommonBundle\Controller\BaseController;
use Doctrine\ODM\MongoDB\LockException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $adverts = $this->get('advert.advert')->findAll();

        return $this->render('@Advert/Default/index.html.twig', [
            'adverts' => $adverts,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     * @throws LockException
     */
    public function detailAction(Request $request, $id)
    {
        $advert = $this->get('advert.advert')->find($id);

        return $this->render('@Advert/Default/detail.html.twig', [
            'advert' => $advert,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        $form = $this->getFF()->create(new AdvertType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $advert = $form->getData();
            $this->getDm()->persist($advert);
            $this->getDm()->flush();

            return $this->redirect($this->get('router')->generate('advert_detail', ['id' => $advert->getId()]));
        }

        return
            $this->render('@Advert/Default/add.html.twig',
                [
                    'form' => $form->createView(),
                ]);

    }
}
