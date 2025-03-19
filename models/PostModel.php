<?php

namespace Models;

use Core\Model;
use PDO;
use PDOException;

class PostModel extends Model{

    public function getPosts() {
        try {
            $pdo = $this->connectDb();
            
            $req = $pdo->prepare("SELECT * FROM posts");
            $req->execute();

            $posts = $req->fetchAll(PDO::FETCH_ASSOC);
                                        
            if($posts){
                return $posts; 
            }

            return false; 

        } catch (PDOException $e) {
            error_log("Erreur SQL login: " . $e->getMessage());
            return false;
        }
        
    }


}