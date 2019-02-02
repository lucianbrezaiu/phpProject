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

ini_set("display_errors",0);

Debugger::enable(Debugger::PRODUCTION);
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

try
{
//    $dsn="mysql:host=localhost;dbname=companydb;charset=utf8mb4";
//    $options=[
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_EMULATE_PREPARES => FALSE
//    ];
//
//
//    $db = new PDO($dsn,"root","",$options);
//
//    $sql = "INSERT INTO User(Username,Email,Password) VALUES (?,?,?)";
//    $stmt = $db->prepare($sql);
//    echo "Ma pregatesc sa inserez"."<br>";
//    $stmt->execute(["lamborghini","lamborghini@gmail.com","test"]);
//    echo "Am inserat cu indexul:".$db->lastInsertId();


    $test = new \App\Models\User(4,"Luci","luci@gmail.com","test");
    $array=['Username'=>'Lucica'];
    dd($test->find($array));

}
catch(PDOException $e)
{
    throw new PDOException($e->getMessage(),$e->getCode());
}

//$requestUrl = $_SERVER['REQUEST_URI'];
//$queryString = $_SERVER['QUERY_STRING'];
//
//$router = new Framework\Router($requestUrl,$queryString,$routes);
//
//$router->start();



