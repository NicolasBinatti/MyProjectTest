<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
if (!defined("__DEBUG")) {
    define("__DEBUG", $_GET['debug'] ?? 0);
    
}
if(!defined("__DEV__")){
    define("__DEV__", false);
}
$dir = dirname(dirname(__DIR__));

require $dir . '/vendor/autoload.php';
$settings = require $dir . '/App/Src/Api/settings.php';

$app = new \Slim\App($settings);

require $dir . '/App/Src/Api/dependencies.php';
require $dir . '/App/Src/Api/middleware.php';
require $dir . '/App/Src/Web/routes.php';

$app->run();