<?php

namespace App\Core;

/**
 * Classe controller mère qui sera à hériter pour mettre en place des controlleurs custom
 */
class Controller
{
    /**
     * Cette fonction include le fichier de vue (pour l'afficher) en lui passant les données fournies dans le tableau $data
     * 
     * @param $view_name Le nom de la vue (comme le nom du fichier php associé)
     * @param $data Les données à passer à la vue
     */
    protected function render(string $view_name, $data = [])
    {
        // création de variables à partir du tableau associatif nommé $data
        // par exemple, si le tableau contient [ 'nom' => 'Lovelace', 'prenom' => 'Ada' ] deux variables $nom et $prenom seront créées
        extract($data);

        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        // début de l'écriture dans le buffer de sortie
        ob_start();
        // Intégration du contenu de la base
        require(__DIR__ . "/../Views/$view_name.php");
        // préparation de la variable $content pour la vue, utilisation de ob_get_clean pour récupérer ce qu'il y a dans le buffer
        $content = ob_get_clean();
        require(__DIR__ . "/../Views/Layout/Main.php");
    }

}