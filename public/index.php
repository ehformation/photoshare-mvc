<?php
session_start();

use Core\Router;
use Core\Dispatcher;

define('BASE_URL', '/photoshare/project/public');

spl_autoload_register(function($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class ) . '.php';
    
    $baseDir = __DIR__ . "/../";
    
    if(file_exists($baseDir.$classPath)){
        require_once $baseDir . $classPath;
    }
});

/*On charge les routes disponible*/
Router::loadRoutes();

/* On recupere l'URL et la méthode saisi par le client */
$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

/* On execute la methode du clesse precise en fonction de l'URL */
Dispatcher::dispatch($requestUrl, $requestMethod);

?>