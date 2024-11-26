<?php
class Router
{
    protected $routes  = [];
    public function  add($uri, $method, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add($uri, "GET", $controller);
    }
    public function post($uri, $controller)
    {
        $this->add($uri, "POST", $controller);
    }
    public function delete($uri, $controller)
    {
        $this->add($uri, "DELETE", $controller);
    }
    public function patch($uri, $controller)
    {
        $this->add($uri, "PATCH", $controller);
    }
    public function put($uri, $controller)
    {
        $this->add($uri, "PUT", $controller);
    }
    public function routeTo($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {

                return  require basepath($route["controller"]);
            }
        }
        $this->port();
    }
    public function port($statusCode = 404)
    {
        http_response_code($statusCode);
        require basepath("views/$statusCode.php");
        die();
    }
}
// $routes =require "routes.php";


// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];



// function routeToControllers($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require $routes[$uri];
//     } else {
//         port();
//     }
// }
// function port($statusCode = 404)
// {
//     http_response_code($statusCode);
//     require "views/$statusCode.php";
//     die();
// }
// routeToControllers($uri, $routes);
