<?php

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/view/{name}', function ($name) use ($app) {
    return $app['twig']->render('index.html.twig', array(
        'name' => $name,
    ));
});

$app->get('/', 'OndeAlmocar\Controller\IndexController::indexAction')
    ->bind('homepage');