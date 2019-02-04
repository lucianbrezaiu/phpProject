<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 13:39
 */

$routes = [

  "/" => ["controller" => "PageController", "action" => "loadLoginPage"],

  "/login" => ["controller" => "UserController", "action" => "loginUser", "guard" => "Authenticated"],

  "/administrator" => ["controller" => "PageController", "action" => "loadAdminPage", "guard" => "Authenticated"],

  "/employee" => ["controller" => "PageController", "action" => "loadEmployeePage", "guard" => "Authenticated"],

  "/administrator/registerUser" => ["controller" => "UserController", "action" => "registerUser", "guard" => "Authenticated"],

   "/administrator/logout" => ["controller" => "AdminController", "action" => "logoutAdmin"],





  "/page/about-us" => ["controller" => "PageController", "action" => "aboutUsAction"]  ,

  "/user/{id}" => ["controller" => "UserController", "action" => "showAction"] ,

  "/user/edit/{id}" => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'] ,

];