<?php

namespace Models;

use Core\Model;

class UserModel extends Model{

    public function login($email, $pass) {
        try {
            $pdo = $this->connectDb();

            $req = $pdo->prepare("SELECT * FROM users WHERE email = ? AND 	password = ? ");

            $req->execute([$email, $pass]);

            $user = $req->fetch(PDO::FETCH_ASSOC);
            return $user;
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