<?php
namespace AdvertBundle\Controller;

use CommonBundle\Controller\BaseController;
use Doctrine\ODM\MongoDB\LockException;
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
}
