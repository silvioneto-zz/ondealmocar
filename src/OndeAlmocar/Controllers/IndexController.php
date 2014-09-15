<?php

namespace OndeAlmocar\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use OndeAlmocar\Models\Restaurantes;

class IndexController
{
    public function indexAction(Request $request, Application $app)
    {

       $rest = new Restaurantes();

       //return $app['twig']->render('index.html.twig', array('restaurante' => $rest->getRestaunteHoje()));
        return $app['twig']->render('index.html.twig', array('restaurante' => '111'));
    }
}
