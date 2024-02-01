<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\PostManager;

class PostController extends Controller 
{
    public function show($params) 
    {
        //Les paramètres sont envoyés à la fonction sous forme de tableau, donc il faut aller récupérer celui que l'on souhaite 
        $id = $params['id'];

        //Puis on le transmet à notre fonction du manager
        $post = PostManager::getPostById($id);

        $this->render('Single', [
            'post' => $post
        ]);
    }
}