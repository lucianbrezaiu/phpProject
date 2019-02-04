<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 13:39
 */

$routes = [

  "/" => ["controller" => "PageController", "action" => "loadLoginPage"],

  "/login" => ["controller" => "UserController", "action" => "loginUser", "guard" => "Authenticated"], //nu are pagina


  "/administrator" => ["controller" => "PageController", "action" => "loadAdminPage", "guard" => "Authenticated"],

  "/employee" => ["controller" => "PageController", "action" => "loadEmployeePage", "guard" => "Authenticated"],


  "/administrator/addAccount" => ["controller" => "PageController", "action" => "loadAddAccountPage", "guard" => "Authenticated"],

  "/administrator/deleteAccount" => ["controller" => "PageController", "action" => "loadDeleteAccountPage"],

  "/administrator/register" => ["controller" => "AdminController", "action" => "register", "guard" => "Authenticated"], // nu are pagina

  "/administrator/logout" => ["controller" => "AdminController", "action" => "logout"],




  "/page/about-us" => ["controller" => "PageController", "action" => "aboutUsAction"]  ,

  "/user/{id}" => ["controller" => "UserController", "action" => "showAction"] ,

  "/user/edit/{id}" => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'] ,

];