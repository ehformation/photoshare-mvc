<?php
namespace Controllers;

use Core\Controller;
use Models\PostModel;
use Models\LikeModel;
use Core\Helper;

class HomeController extends Controller {
    public function index() {
        $postModel = new PostModel();
        $likeModel = new LikeModel();

        $posts = $postModel->getPosts();

        foreach ($posts as &$post){
            $post['created'] = Helper::calculaleLastUpdate($post['created']);

            $post['nbrLikes'] = $likeModel->countLikesByPostId($post['id']);
        }

        $this->render('home', ['posts' => $posts]);
    }
}