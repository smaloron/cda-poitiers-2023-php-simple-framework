<?php
// Auto chargement des classes

use Seb\Framework\Router;
use Seb\App\Controller\HomeController;

require "../vendor/autoload.php";

// Chemin de base de l'application
define("ROOT_PATH", dirname(__DIR__));

$routes = [
    "/" => [HomeController::class, "index"],
    '/details/([0-9]+)' => [HomeController::class, "details"]
];

$router = new Router($routes);
$router->run();