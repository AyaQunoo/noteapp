<?php
class Router
{
    protected $routes  = [];
    public function  add($uri, $method, $controller)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middlware" => null
        ];
        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add($uri, "GET", $controller);
    }
    public function post($uri, $controller)
    {
        return $this->add($uri, "POST", $controller);
    }
    public function delete($uri, $controller)
    {
        return $this->add($uri, "DELETE", $controller);
    }
    public function patch($uri, $controller)
    {
        return  $this->add($uri, "PATCH", $controller);
    }
    public function put($uri, $controller)
    {
        return $this->add($uri, "PUT", $controller);
    }
    public function only($string)
    {
        $this->routes[array_key_last($this->routes)]['middlware'] = $string;
        return $this;
    }
    public function routeTo($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                if ($route["middlware"]) {
                    Middleware::resolve($route["middlware"]);
                }




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
