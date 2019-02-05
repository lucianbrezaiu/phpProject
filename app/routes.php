<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 13:39
 */

$routes = [

  "/" => ["controller" => "PageController", "action" => "loadHomePage"],

  "/login" => ["controller" => "PageController", "action" => "loadLoginPage"],

  "/redirect" => ["controller" => "PageController", "action" => "redirect"],

  "/authenticate" => ["controller" => "UserController", "action" => "loginUser", "guard" => "Authenticated"],

  "/administrator" => ["controller" => "PageController", "action" => "loadAdminPage", "guard" => "Authenticated"],

  "/employee" => ["controller" => "PageController", "action" => "loadEmployeePage", "guard" => "Authenticated"],

  "/administrator/addAccount" => ["controller" => "PageController", "action" => "loadAddAccountPage", "guard" => "Authenticated"],

  "/administrator/deleteAccount" => ["controller" => "PageController", "action" => "loadDeleteAccountPage", "guard" => "Authenticated"],

  "/administrator/register" => ["controller" => "AdminController", "action" => "register", "guard" => "Authenticated", "guard" => "Authenticated"],

  "/administrator/remove" => ["controller" => "AdminController", "action" => "remove", "guard" => "Authenticated", "guard" => "Authenticated"],

  "/administrator/logout" => ["controller" => "AdminController", "action" => "logout", "guard" => "Authenticated"],




  "/page/about-us" => ["controller" => "PageController", "action" => "aboutUsAction"]  ,

  "/user/{id}" => ["controller" => "UserController", "action" => "showAction"] ,

  "/user/edit/{id}" => ['controller' => 'UserController', 'action' => 'showAction', 'guard' => 'Authenticated'] ,

];