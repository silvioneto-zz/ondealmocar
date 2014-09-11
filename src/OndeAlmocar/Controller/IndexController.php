<?php

namespace OndeAlmocar\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use OndeAlmocar\Model\Restaurantes;

class IndexController
{
    public function indexAction(Request $request, Application $app)
    {

       $rest = new Restaurantes();

       return $app['twig']->render('index.html.twig', array('variable' => $rest->getRestaunteHoje()));
    }
}