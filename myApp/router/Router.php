<?php 
use MYAPP\Controllers\ProductController;
use MYAPP\Models\productsModel;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once 'controllers/ProductController.php';
include_once 'models/productsModel.php';


class Router {
    protected $routes = [];
    public function __construct() {
    //   echo"Router Constructor<br>";
    }
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }
    public function getRoutes()
    {
        return $this->routes;
    }
    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {

        $this->addRoute($route, $controller, $action, "POST");
    }

    public function put($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "PUT");
    }
    public function dispatch() //to send uri
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];

        var_dump($uri);

        var_dump($method);
        // die(var_dump($uri));

        //var_dump($this->routes[$method][$uri]);
        if (isset($this->routes[$method][$uri])) {

            
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];
            
            $controller = new $controller();
            $controller->$action();          
        } else {
            throw new \Exception("No route found for URI: $uri");
        }  
        
    }
}

?>
