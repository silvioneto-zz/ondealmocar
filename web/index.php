<?php
// web/index.php
$loader = require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$loader->add('OndeAlmocar', __DIR__. '/../src');

require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../src/app.php';
require __DIR__.'/../src/routes.php';

$app->run();
