<?php

namespace App\Core;

class Router
{
    // liste des routes de l'application
    public $routes = [];

    /**
     * Function permettant d'ajouter une route.
     * 
     * @param $route Le chemin de la route (par exemple "/" pour la page d'accueil)
     * @param $controller Le nom du controller
     * @param $action Nom de la fonction du controller qui va gérer la requête
     */
    public function addRoute(string $route, string $controller, string $action)
    {
        // Convertion de la partie dynamique de la route qui va remplacer le {id} défini dans le fichier de route par le paramètre envoyé sous la forme d'un tableau associatif
        $routeRegex = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route);

        //modification du tableau association des routes pour ajouter le controller et l'action
        $this->routes[$routeRegex] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Prend une URI et redirige la page
     */
    public function dispatch(string $uri)
    {
        foreach ($this->routes as $routePattern => $routeConfig) {
            // On vérifie si l'uri matche le pattern
            if (preg_match("#$routePattern#", $uri, $matches)) {
                // On retire le premier élément de match car il contient l'uri entière alors que nous souhaitons uniquement capturer les paramètres
                array_shift($matches);

                // On fusionne les paramètres et leur valeur dans un tableau associatif
                $routeParams = array_combine(array_keys($matches), array_values($matches));

                // On récupère le controller et l'action 
                $controllerClass = $routeConfig['controller'];
                $action = $routeConfig['action'];

                // On instancie le controller
                $controller = new $controllerClass();

                // On appelle l'action en envoyant les paramètres de la route
                $controller->$action($routeParams);

                return;
            }
        }

        // TODO redirection vers une page 404
        throw new \Exception("No route found for URI: $uri");
    }
}
