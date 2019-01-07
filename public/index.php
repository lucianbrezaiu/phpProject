<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 12:31
 */


require __DIR__ . '/../vendor/autoload.php';
include "../app/routes.php";
use Tracy\Debugger;

ini_set("error_log",__DIR__ . "/../logs/error.log");
ini_set("display_errors",0);

if(\App\Config::ENV === 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    Debugger::enable(Debugger::DEVELOPMENT);
}


function bd($data) {
    bdump($data);
}

function dd($data) {
    dump($data);
    die();
}



$requestUrl = $_SERVER['REQUEST_URI'];
$queryString = $_SERVER['QUERY_STRING'];

$router = new Framework\Router($requestUrl,$queryString,$routes);
echo $router;

$router->start();



