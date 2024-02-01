<?php

namespace App;

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;

// Instanciation du router
$router = new Router();

// Définition de toutes les routes du site
$router->addRoute('/single/{id}', PostController::class, 'show');
$router->addRoute('/', HomeController::class, 'index');
