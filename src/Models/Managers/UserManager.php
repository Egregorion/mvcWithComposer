<?php 

namespace App\Models\Managers;

use App\Models\Database;
use App\Models\Entities\User;

class UserManager
{
    public static function signup($pseudo, $email, $password)
    {
        $dbh = Database::connect();
        $query = "INSERT INTO t_user (pseudo, email, password) VALUES (:pseudo, :email, :password)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public static function login($email, $password)
    {
        $dbh = Database::connect(); 
        $query = "SELECT * FROM t_user WHERE email = :email";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();
        if($user){
            $isVerifiedPassword = password_verify($password, $user->getPassword());
            if($isVerifiedPassword){
                session_start();
                $_SESSION['user'] = $user;
                header('location: /');
            }else{
                echo "mot de passe incorrect";
            }
        }else{
            echo "usr unknown";
        }
    } 
}