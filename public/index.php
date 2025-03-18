<?php
use Core\Router;
use Core\Dispatcher;

spl_autoload_register(function($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class ) . '.php';
    
    $baseDir = __DIR__ . "/../";
    
    if(file_exists($baseDir.$classPath)){
        require_once $baseDir . $classPath;
    }
});

Router::loadRoutes();

$requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];

Dispatcher::dispatch($requestUrl, $requestMethod);

?>