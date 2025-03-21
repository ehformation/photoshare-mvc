<?php 

namespace Core;

use Core\Router;

class Dispatcher {

    public static function dispatch($requestUri, $requestMethod){
        
        $requestUri = str_replace(BASE_URL, '', $requestUri);

        $route = Router::match($requestUri, $requestMethod);

        if(!$route){
           echo '<h1>404 - Page non trouvé</h1>';
           exit();
        }

        list($controllerName, $method) = explode('@', $route['controller']);
        $controllerClass = "Controllers\\$controllerName";

        if(!class_exists($controllerClass)){
           echo "<h1>500 - Class introuvable : $controllerClass</h1>";
           exit();
        }

        $controller = new $controllerClass;

        if(!method_exists($controller, $method)){
            echo "<h1>500 - Methode introuvable : $method dans la class $controllerClass</h1>";
            exit();
        }
        if (!empty($route['params'])) {
            call_user_func_array([$controller, $method], $route['params']);
        } else {
            $controller->$method();
        }

    }

}
