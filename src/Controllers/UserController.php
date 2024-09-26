<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\UserManager;

class UserController extends Controller{

    public function signup()
    {
        if(isset($_POST)&&!empty($_POST)){
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            UserManager::signup($pseudo, $email, $hashedPassword);
        }

        return $this->render('Signup', [
            'message'=>"ceci est la page d'inscription"
        ]);
    } 

    public function login()
    {
        if(isset($_POST)&&!empty($_POST)){
            $email = $_POST['email'];
            $password = $_POST['password'];
            UserManager::login($email, $password);
        }

        return $this->render('Login', []);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location: /');
    }
}