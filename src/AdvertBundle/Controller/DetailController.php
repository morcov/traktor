<?php
namespace AdvertBundle\Controller;

use CommonBundle\Controller\BaseController;
use Doctrine\ODM\MongoDB\LockException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DetailController extends BaseController
{
    /**
     * @param Request $request
     * @param $id
     * @return Response
     * @throws LockException
     */
    public function indexAction(Request $request, $id)
    {
        $advert = $this->get('advert.advert_repository')->find($id);

        return $this->render('AdvertBundle:Detail:index.html.twig', [
            'advert' => $advert,
        ]);
    }
}
