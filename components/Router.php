<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:40
 */

namespace Comments\components;

class Router
{
    private $routes;

    /**
     * Routes file connection constructor
     */
    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;
    }

    /**
     * Setting base URL address
     */
    private function getURL()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return substr($_SERVER['REQUEST_URI'], strlen('/'));
        }
    }

    /**
     * Router main workplace
     */
    public function run()
    {
        $uri = $this->getURL();

        foreach ($this->routes as $uriPattern => $path) {


            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include $controllerFile;
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null){
                    break;
                }
            }
            }
        }


}