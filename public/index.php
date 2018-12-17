<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 12:31
 */


require __DIR__ . '/../vendor/autoload.php';
include "../app/routes.php";
require_once "../app/config.php";

ini_set("error_log",__DIR__ . "/../logs/error.log");
ini_set("display_errors",0);
if($config["env"]==="dev")
{
    ini_set("display_errors",1);
    error_reporting(E_ALL);
}

$requestUrl = $_SERVER['REQUEST_URI'];
$queryString = $_SERVER['QUERY_STRING'];

$router = new Framework\Router($requestUrl,$queryString,$routes);
echo $router;

$router->start();



