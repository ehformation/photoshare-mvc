<?php
namespace Controllers;

use Core\Controller;
use Models\PostModel;
use Core\Helper;

class HomeController extends Controller {
    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->getPosts();

        foreach ($posts as &$post){
            $post['created'] = Helper::calculaleLastUpdate($post['created']);
        }

        $this->render('home', ['posts' => $posts]);
    }
}