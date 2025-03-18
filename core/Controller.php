<?php 
namespace Core;

class Controller {
    protected function render($view) {
        $viewFile = __DIR__ . '/../views/' . $view . 'View.php';

        if(!file_exists($viewFile)){
            die('Erreur : La vue ' . $view . 'n\'existe pas !');
        }

        ob_start();
        require_once $viewFile;
        echo ob_get_clean();
    }
}