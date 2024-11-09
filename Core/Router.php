<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => ['name' => null, 'redirectUrl' => null]
        ];

        return $this;
    }
    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function onlyMiddleware($key, $redirectUri = '/')
    {
        $this->routes[array_key_last($this->routes)]['middleware']['name'] = $key;
        $this->routes[array_key_last($this->routes)]['middleware']['redirectUrl'] = $redirectUri;

        return $this;
    }

    public function route($uri, $method){

        foreach ($this->routes as $route){
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){

                //to check for middleware
                if ($route['middleware']['name'] === 'guest'){
                    if ($_SESSION['user'] ?? false){
                        redirect("{$route['middleware']['redirectUrl']}");
//                        header("location: {$route['middleware']['redirectUrl']}");
                        exit();
                    }
                } elseif ($route['middleware']['name'] === 'auth'){
                    if (!isset($_SESSION['user'])){
                        redirect("{$route['middleware']['redirectUrl']}");
//                        header("location: {$route['middleware']['redirectUrl']}");
                        exit();
                    }
                }

                return require basePath($route['controller']);
            }
        }

        return abort();

    }


}