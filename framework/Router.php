<?php

namespace Seb\Framework;

use Exception;

class Router
{

    private array $routes;
    private string $url;
    private string $controllerName;
    private string $methodName;

    public function __construct(array $routes)
    {
        $this->url = filter_input(INPUT_SERVER, "REQUEST_URI");
        $this->routes = $routes;
        $this->routeMatch();
    }

    /**
     * Trouver une correspondance entre l'url et une route
     * référencée dans la table de routage
     *
     * @return void
     */
    private function routeMatch()
    {
        if (array_key_exists($this->url, $this->routes)) {
            $foundRoute = $this->routes[$this->url];
            $this->controllerName = $foundRoute[0];
            $this->methodName = $foundRoute[1];
        } else {
            throw new Exception("Route non trouvée");
        }
    }

    /**
     * Instancie de controller et exécute la méthode
     *
     * @return void
     */
    public function run()
    {
        $controller = new $this->controllerName();
        $method = $this->methodName;
        $controller->$method();
    }
}