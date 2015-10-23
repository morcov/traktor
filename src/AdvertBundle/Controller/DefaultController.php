<?php
namespace AdvertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdvertBundle:Default:index.html.twig', array('name' => $name));
    }
}
