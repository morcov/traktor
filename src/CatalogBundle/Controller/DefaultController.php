<?php
namespace CatalogBundle\Controller;

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

        return new Response();
    }
}
