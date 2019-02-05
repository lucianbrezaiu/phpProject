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

    /**
     * Functia verifica daca o ruta este statica.
     */
    private function isStaticRoute() : bool
    {
        return isset($this->routes[$this->requestUrl]);
    }

    /**
     * Functia verifica ruta curent in scopul redirectarii.
     */
    public function start() : void
    {
        if($this->isStaticRoute())
        {
            $this->callController();
        }
        else if(preg_match('/\d+/',$this->requestUrl, $id))
        {
            $array = explode('/',$this->requestUrl);

            $array[2] = '{id}';

            $this->requestUrl = implode('/',$array);

            if($this->isStaticRoute())
            {
                $this->callController($id[0]);
            }
        }
        else
        {
            echo '<br>ERROR 404!';
        }
    }

    /**
     * Functia apeleaza actiunea unui controller, actiune specifica unei rute.
     */
    public function callController(int $id = null): void
    {
        $this->checkGuard($this->requestUrl);

        $controller = $this->routes[$this->requestUrl]['controller'];
        $action = $this->routes[$this->requestUrl]['action'];

        $controller = "\\App\\Controllers\\" . $controller;

        $controllerObj = new $controller();
        $controllerObj->{$action}($id);
    }

    /**
     * Functia verifica daca ruta este securizata de o clasa Guard.
     */
    private function checkGuard(string $route): void
    {
        if (isset($this->routes[$route]["guard"])) {
            $guard = "\\App\\Guards\\" . $this->routes[$route]["guard"];
            (new $guard)->handle();
        }
    }

}

