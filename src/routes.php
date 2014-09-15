<?php

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/view/{name}', function ($name) use ($app) {
    return $app['twig']->render('index.html.twig', array(
        'name' => $name,
    ));
});

$app->get('/blog/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM restaurantes WHERE idRestaurante = ?";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));

    return  "<h1>{$post['nome']}</h1>";
});

$app->get('/', 'OndeAlmocar\Controllers\IndexController::indexAction')
    ->bind('homepage');