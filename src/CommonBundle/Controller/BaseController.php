<?php

namespace CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends  Controller
{

    public function getDm()
    {
        return $this->get('doctrine.odm.mongodb.document_manager');
    }

}