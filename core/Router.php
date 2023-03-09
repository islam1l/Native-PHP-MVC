<?php

namespace App\Core;

use Exception;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];


    public function get($uri,$controller){
        $this->routes['GET'][$uri] = $controller;
    }
    public function post($uri,$controller){
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @throws Exception
     */
    public function direct($uri, $requestType){
        if(array_key_exists($uri,$this->routes[$requestType])){
          return  $this->callAction(
              ...explode('@',$this->routes[$requestType][$uri])
          );
        }

        throw new Exception(message: 'No Route Defined For This URI.');
    }

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    protected function callAction($controller,$action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if(! method_exists($controller,$action)){
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action();
    }
}
