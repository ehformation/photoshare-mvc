<?php 

namespace Core;

class Router {

    private static $routes = [];

    public static function add($method, $uri, $controller) {
        self::$routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri, 
            'controller' => $controller
        ];
    }

    public static function match($requestUrl, $requestMethod){
        foreach (self::$routes as &$route) {
            $pattern = ''; 
            if(strpos($route['uri'], '{') != false){
                $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route['uri']);
                $pattern = '#^' . $pattern . '$#';
            }
            
            if($pattern != ''){
                preg_match($pattern, $requestUrl, $matches);
                if($route['method'] == strtoupper($requestMethod)){
                    unset($matches[0]);
                    $route['params'] = array_values($matches);
                    return $route;
                }
            }else{
                if($route['uri'] == $requestUrl && $route['method'] == strtoupper($requestMethod)){
                    return $route;
                }
            }            
        }
    }

    public static function loadRoutes() {
        self::add('GET', '/', 'HomeController@index');
        self::add('GET', '/login', 'AuthController@login'); //Afficher le formulaire de connexion
        self::add('POST', '/login', 'AuthController@loginAction');
        self::add('GET', '/register', 'AuthController@register'); //Afficher le formulaire d'inscription
        self::add('POST', '/register', 'AuthController@registerAction');
        self::add('GET', '/logout', 'AuthController@logout');

        self::add('POST', '/post/add', 'PostController@addPost');

        self::add('GET', '/like/add/{post_id}', 'LikeController@addLike');
    }

}