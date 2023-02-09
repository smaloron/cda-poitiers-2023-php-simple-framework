<?php

namespace Seb\Framework;

use Exception;

class Router
{

    private array $routes;
    private string $url;
    private string $controllerName;
    private string $methodName;
    private string $queryString = "";

    public function __construct(array $routes)
    {
        // obtention de l'url par découpage de l'uri
        // en deux parties, le chemin et le querystring
        // URI = /person?id=8
        // URL = /person querystring = id=8
        $uri = filter_input(INPUT_SERVER, "REQUEST_URI");
        $uriParts = explode("?", $uri);
        $this->url = $uriParts[0];
        // Affectation du querystring si il y en a un
        if (count($uriParts) === 2) {
            $this->queryString = $uriParts[1];
        }

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
        // Instanciation de l'objet Query
        $query = new HTTPQuery($this->queryString);
        var_dump($query);
        $controller = new $this->controllerName($query);
        $method = $this->methodName;
        $controller->$method();
    }
}