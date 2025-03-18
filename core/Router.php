<?php 

namespace App\Core;

class Router {

    private $routes = [];

    public static function add($method, $uri, $controller) {
        self::$routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri, 
            'controller' => $controller
        ];
    }

    public static function match($requestUrl, $requestMethod){
        foreach (self::$routes as $route) {
            if($route['uri'] == $requestUrl && $route['method'] == strtoupper($requestMethod)){
                return $route;
            }
        }
    }

    public static function loadRoutes() {
        self::add('GET', '/', 'HomeController@index');
    }





}