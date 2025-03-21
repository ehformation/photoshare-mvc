<?php
namespace Controllers;

use Core\Controller;
use Models\PostModel;
use Models\LikeModel;
use Core\Helper;

class LikeController extends Controller {

    public function addLike($post_id) {
        if(!isset($_SESSION['user'])){
            Helper::redirect('/login');
        }
        $user_id = $_SESSION['user']['id'];
        $post_id = htmlspecialchars($post_id);

        if($post_id == false || $post_id <= 0) {
            echo "Identifiant du post invalid";
            exit();
        }

        $likeModel = new LikeModel();   
        $res = $likeModel->addLike($post_id, $user_id);
        
        Helper::redirect('/');
    }

}