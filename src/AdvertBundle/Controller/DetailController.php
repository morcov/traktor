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
     * @param $slug
     * @return Response
     * @internal param $id
     */
    public function indexAction(Request $request, $slug)
    {
        $advert = $this->get('advert.advert_repository')->findBySlug($slug);

        return $this->render('AdvertBundle:Detail:index.html.twig', [
            'advert' => $advert,
        ]);
    }
}
