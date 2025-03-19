<?php
namespace Controllers;

use Core\Controller;
use Models\PostModel;

class HomeController extends Controller {
    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->getPosts();
        $this->render('home', ['posts' => $posts]);
    }
}