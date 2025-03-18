<?php
namespace Controllers;

use Core\Controller;
use Models\UserModel;

class AuthController extends Controller {
    public function login() {
        $this->render('login');
    }

    public function loginAction() {
        if(isset($_POST['email'])){
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);

            //Le modèle va récupérer les valeurs et voir si l'utilisateur existe dans la bdd 
            $userModel = new UserModel();
            $user = $userModel->login($email, $pass);

            //Si l'utilisateur existe le controller va lui créer une sessions   

        }
    }
}