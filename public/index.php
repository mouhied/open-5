<?php

use App\Autoloader;
use App\core\Main;

define('ROOT', dirname(__DIR__));


require_once ROOT . '/Autoloader.php';
Autoloader::register();

$app = new Main(); // le routeur principal

$app->start();
