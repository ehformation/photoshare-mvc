<?php

namespace Models;

use Core\Model;

class UserModel extends Model{

    public function login($email, $pass) {
        $pdo = $this->connectDb();

        $req = $pdo->prepare("SELECT * FROM users WHERE email = ? AND 	password = ? ");

        $req->execute([$email, $pass]);

        $user = $req->fetch(PDO::FETCH_ASSOC);

        return $user;
        
    }
}