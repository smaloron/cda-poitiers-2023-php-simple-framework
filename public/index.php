<?php
// Auto chargement des classes

use Seb\App\Controller\AddressController;
use Seb\Framework\Router;
use Seb\App\Controller\HomeController;
use Seb\Framework\DependencyContainer;
use Seb\App\Model\DAO\AddressDAO;
use Seb\Framework\Form\DivDecorator;
use Seb\Framework\Form\Form;
use Seb\Framework\Form\FormWidget;

require "../vendor/autoload.php";

// Chemin de base de l'application
define("ROOT_PATH", dirname(__DIR__));

$routes = [
    "/" => [HomeController::class, "index"],
    "/details/([0-9]+)" => [HomeController::class, "details"],
    "/adresse/([0-9]+)" => [AddressController::class, "details"],
    "/adresse/nouvelle" => [AddressController::class, "new"]
];

// Conteneur de dépendances
$container = new DependencyContainer();
$container->add(
    "pdo",
    function () {
        return
            new \PDO(
                "mysql:host=localhost;dbname=cda_poitiers_2023_sql;charset=utf8",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
    }
);
$container->add(
    "dao.address",
    function () use ($container) {
        return new AddressDAO($container->get("pdo"));
    }
);

$container->add("form.address", function () {
    $decorator = new DivDecorator;
    $form = new Form;
    $streetWiget = new FormWidget("votre rue", "rue");
    $streetWiget->setDecorator($decorator);
    $form->addWiget($streetWiget);

    $zipCodeWiget = new FormWidget("votre code postal", "code_postal");
    $zipCodeWiget->setDecorator($decorator);
    $form->addWiget($zipCodeWiget);

    $cityWiget = new FormWidget("votre ville", "ville");
    $cityWiget->setDecorator($decorator);
    $form->addWiget($cityWiget);

    return $form;
});

$router = new Router($routes, $container);
$router->run();