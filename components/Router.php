<?php

class Router {

  private $routes;

  public function __construct() {
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
  }

  // Returns request string
  private function getURI() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      $uri = str_replace('php-test/', '' , $_SERVER['REQUEST_URI']);

      return trim($uri, '/');
    }
  }

  public function run() {
    // Get request line
    $uri = $this->getURI();

    // Check for such request
    foreach ($this->routes as $uriPattern => $path) {

      // Compare $uriPattern and $uri
      if (preg_match("~$uriPattern~", $uri)) {

        // Get internal path from external according to rule
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);  

        // Determine which controller and action is processing the request
        $internalRoute = str_replace('php-test/', '', $internalRoute);
        
        $segments = explode('/', $internalRoute);

        // echo "<br>$internalRoute</br>";

        $controllerName = ucfirst(array_shift($segments) . 'Controller');
        $actionName = 'action' . ucfirst(array_shift($segments));

        // echo "<br>controller name: <b>$controllerName</b>";
        // echo "<br>action name: <b>$actionName</b>";
        $parameters = $segments;
        // echo '<pre>';
        // print_r($parameters);
        // echo '</pre>';

        // Connect controller class files
        $controllerFile = ROOT . "/controllers/$controllerName.php";
        if (file_exists($controllerFile)) {
          include_once($controllerFile);
        }

        // Create object, call method (action)
        $controllerObject = new $controllerName;

        $result = call_user_func_array(
          array($controllerObject, $actionName), 
          $parameters
        );

        if ($result != null) {
          break;
        }
      } 
    }  
  }
}

