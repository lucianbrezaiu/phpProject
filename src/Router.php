<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 22:13
 */

namespace Framework;

class Router
{
    private $requestUrl;
    private $queryString;
    private $routes;

    public function __construct($request,$string,$routes)
    {
        $this->requestUrl = $request;
        $this->queryString = $string;
        $this->routes = $routes;
    }

    private function isStaticRoute() : bool
    {
        if(isset($this->routes[$this->requestUrl]))
        {
            return true;
        }
        return false;
    }

    public function start() : void
    {
        if($this->isStaticRoute())
        {
            $controller = $this->routes[$this->requestUrl]['controller'];
            $action = $this->routes[$this->requestUrl]['action'];

            $controller = "\\App\\Controllers\\".$controller;

            $controllerObj = new $controller();
            $controllerObj->{$action}();
        }
        else if(preg_match('/\d+/',$this->requestUrl, $id))
        {
            $array = explode('/',$this->requestUrl);

            $array[2] = '{id}';

            $this->requestUrl = implode('/',$array);

            if($this->isStaticRoute())
            {
                $controller = $this->routes[$this->requestUrl]['controller'];
                $action = $this->routes[$this->requestUrl]['action'];

                $controller = "\\App\\Controllers\\".$controller;

                $controllerObj = new $controller();
                $controllerObj->{$action}($id[0]);
            }
        }
        else
        {
            echo '<br>Route does not exist!';
        }
    }

    public function __toString() : string
    {
        if($this->queryString!=null)
        {
            return "[Router: requestUrl -> $this->requestUrl, queryString -> $this->queryString]";
        }
        else
        {
            return "[Router: requestUrl -> $this->requestUrl ]";
        }
    }

}

