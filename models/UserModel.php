<?php

namespace Models;

class UserModel {

    public function login($email, $pass) {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=photoshare;charset=utf8",
            'root',
            'root',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);

        $req = $pdo->prepare("SELECT * FROM users WHERE email = ? AND 	password = ? ");

        $req->execute([$email, $pass]);

        $user = $req->fetch(PDO::FETCH_ASSOC);

        return $user;
        
    }
}