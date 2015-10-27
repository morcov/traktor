<?php

namespace CommonBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ErrorController extends BaseController
{
    public function error404Action()
    {
        return new Response('404', 404);
    }
}
