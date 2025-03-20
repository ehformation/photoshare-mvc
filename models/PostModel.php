<?php

namespace Models;

use Core\Model;
use PDO;
use PDOException;

class PostModel extends Model{

    public function getPosts() {
        try {
            $pdo = $this->connectDb();
            
            $req = $pdo->prepare("SELECT * FROM posts ORDER BY created DESC");
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

    public function addPost($imageName, $legende, $user_id) {
        try {
            $pdo = $this->connectDb();

            $req = $pdo->prepare("INSERT INTO posts (image, legende, user_id) VALUES (?, ?, ?)");

            $addPosts = $req->execute([$imageName, $legende, $user_id]);

            return $addPosts; 

        } catch (PDOException $e) {
            error_log("Erreur SQL addPosts: " . $e->getMessage());
            return false;
        }  
    }


}