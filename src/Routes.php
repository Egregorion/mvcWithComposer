<?php

namespace App;

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\UserController;

// Instanciation du router
$router = new Router();

// Définition de toutes les routes du site
$router->addRoute('/single/{id}', PostController::class, 'show');
$router->addRoute('/update/{id}', PostController::class, 'update');
$router->addRoute('/create', PostController::class, 'create');
$router->addRoute('/login', UserController::class, 'login');
$router->addRoute('/logout', UserController::class, 'logout');
$router->addRoute('/signup', UserController::class, 'signup');
$router->addRoute('/', HomeController::class, 'index');

