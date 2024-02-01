<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\PostManager;

class HomeController extends Controller 
{
    public function index() 
    {
        $posts = PostManager::getAllPosts();

        $this->render('Home', [
            'posts' => $posts
        ]);
    }
}