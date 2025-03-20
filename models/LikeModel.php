<?php

namespace Models;

use Core\Model;
use PDO;
use PDOException;

class LikeModel extends Model{

    public function countLikesByPostId($post_id) {
        try {
            $pdo = $this->connectDb();
            
            $req = $pdo->prepare("SELECT COUNT(*) as nbrLikes FROM likes WHERE post_id = ? ");
            $req->execute([$post_id]);

            $likes = $req->fetch(PDO::FETCH_ASSOC);

            return $likes["nbrLikes"] ?? 0;

        } catch (PDOException $e) {
            error_log("Erreur SQL countLikesByPostId: " . $e->getMessage());
            return false;
        }
        
    }
}