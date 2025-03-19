<?php

namespace Models;

use Core\Model;
use PDO;
use PDOException;

class UserModel extends Model{

    public function login($email, $pass) {
        try {
            $pdo = $this->connectDb();
            
            //Je verifie si le mail existe
            $req = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $req->execute([$email]);

            $user = $req->fetch(PDO::FETCH_ASSOC);
                                        
            if($user && password_verify($pass, $user['password'])){
                return $user; 
            }

            return false; 

        } catch (PDOException $e) {
            error_log("Erreur SQL login: " . $e->getMessage());
            return false;
        }
        
    }

    public function register($email, $username, $pass) {
        try {
            $pdo = $this->connectDb();

            $req = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

            $register = $req->execute([$username, $email, $pass]);

            return $register; 

        } catch (PDOException $e) {
            error_log("Erreur SQL register: " . $e->getMessage());
            return false;
        }
        
    }
}