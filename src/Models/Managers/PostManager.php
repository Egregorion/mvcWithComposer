<?php 

namespace App\Models\Managers;

use PDO; 
use App\Models\Database;
use App\Models\Entities\Post;

class PostManager {
    
    public static function getAllPosts() 
    {//pour récupérer tous les articles
        $dbh = Database::connect(); //on récupère notre objet PDO
        $query = ("SELECT * FROM t_post"); //on écrit notre requête SQL
        $stmt = $dbh->prepare($query); //on prépare la requête
        $stmt->execute();//on l'execute 
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, Post::class);//on transcris les résultats en un objet de type Post
        return $posts;//puis on renvoie les résultats
    }

    public static function getPostById($id)
    {
        $dbh = Database::connect();
        $query = ("SELECT * FROM t_post WHERE id_post = :id");
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $post = $stmt->fetch();
        return $post;
    }

    public static function addPost($title, $content, $image, $user_id)
    {
        $dbh = Database::connect();
        $query = "INSERT INTO t_post (title, content, picture, id_user) VALUES (:title, :content, :picture, :user_id)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':picture', $image);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute(); 
    }

    public static function updatePost($title, $content, $image, $id)
    {
        $dbh = Database::connect();
        $query = "UPDATE t_post SET title = :title, content = :content, picture = :img WHERE id_post= :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':img', $image);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
    }
}