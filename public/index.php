<?php
session_start();
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "/functions.php";
spl_autoload_register(function ($class) {
    $paths = [
        basepath('/core/' . $class . '.php'),
        basepath('/core/Middleware/' . $class . '.php'),
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require $path;
            return;
        }
    }
});


$router = new Router();
$routes = require basepath("/routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method =  $_POST["__mehod_request"] ?? $_SERVER["REQUEST_METHOD"];

$router->routeTo($uri, $method);
