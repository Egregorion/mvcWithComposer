<?php 

namespace App\Models; 

use PDO; 
use PDOException;

class Database {
    public static function connect() {
        $dsn = $_ENV['DATABASE_DSN']; //'mysql:host=localhost;dbname=blog'
        $user = $_ENV['DATABASE_USER'];//'root'
        $pass = $_ENV['DATABASE_PASSWORD'];//''
        
        try {
            $dbh = new PDO($dsn, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            return $dbh;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}



    