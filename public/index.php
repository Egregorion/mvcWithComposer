<?php 

use Symfony\Component\Dotenv\Dotenv;

// Chargement de l'autoloader créé par composer (situé dans le sous dossier "vendor")
// si vous n'avez pas de sous-dossier "vendor" lancez dans un terminal la commande suivante : "composer install"
require __DIR__ . '/../vendor/autoload.php';

// chargement des variables d'environnement à partir du dossier racine
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// récupération de l'adresse utilisée pour accéder à la page
$uri = $_SERVER['REQUEST_URI'];

require '../src/Routes.php';
$router->dispatch($uri);