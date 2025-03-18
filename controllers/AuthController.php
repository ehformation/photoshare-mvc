<?php
namespace Controllers;

use Core\Controller;

class AuthController extends Controller {
    public function login() {
        $this->render('login');
    }
}