<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\PostManager;


class PostController extends Controller 
{
    public function show($params) 
    {
        session_start();

        //Les paramètres sont envoyés à la fonction sous forme de tableau, donc il faut aller récupérer celui que l'on souhaite 
        $id = $params['id'];

        //Puis on le transmet à notre fonction du manager
        $post = PostManager::getPostById($id);

        return $this->render('Single', [
            'post' => $post
        ]);
    }

    public function create()
    { 
        session_start();
        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
            if(isset($_POST)&&!empty($_POST)){
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_POST['picture'];
                $user_id = $_SESSION['user']->getIdUser();
                PostManager::addPost($title, $content, $image, $user_id);
            }
            return $this->render('Create', []);
        }else{
            echo "pas de user";
        }
        
    }

    public function update($params)
    { 
        session_start();

        $id = $params['id'];

        $post = PostManager::getPostById($id);

        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
            if(isset($_POST)&&!empty($_POST)){
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_POST['picture'];
                PostManager::updatePost($title, $content, $image, $id);
                header('location: /');
            }
            return $this->render('Update', [
                'post'=>$post
            ]);
        }else{
            echo "pas de user";
        }
        
    }
}