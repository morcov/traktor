<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/default/default.html.twig');
    }

    /**
     */
    public function nameAction(Request $request, $name)
    {
//        return new Response($name);
        // replace this example code with whatever you need
        return $this->render('AppBundle:default:index.html.twig', [
            'name' => $name,
        ]);
    }
}
