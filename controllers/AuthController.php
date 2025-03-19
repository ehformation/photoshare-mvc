<?php
namespace Controllers;

use Core\Controller;
use Models\UserModel;
use Core\Helper;

class AuthController extends Controller {
    public function login() {
        if(isset($_SESSION['user'])){
            Helper::redirect('/');
        }
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
            if($user){
                $_SESSION['user'] = $user;
                Helper::redirect('/');
            }else{
                $this->render('login', ['error' => "Identifiants invalides"]);
            }
        }
    }

    public function register() {
        if(isset($_SESSION['user'])){
            Helper::redirect('/');
        }
        $this->render('register');
    }

    public function registerAction() {
        if(isset($_POST['email'])){
            $email = trim($_POST['email']);
            $username = trim($_POST['username']);
            $pass = password_hash( trim($_POST['pass']), PASSWORD_BCRYPT);

            $userModel = new UserModel();
            $register = $userModel->register($email, $username, $pass);

            if($register){
                Helper::redirect('/login');
            }else{
                $this->render('register', ['error' => "Inscription non effectuée. Veuillez réessayer"]);
            }
        }
    }

}