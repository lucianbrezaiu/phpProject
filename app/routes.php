<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 12-Nov-18
 * Time: 13:39
 */

$routes = [

  "/page/about-us" => ["controller" => "PageController", "action" => "aboutUsAction"]  ,

  "/user/{id}" => ["controller" => "UserController", "action" => "showAction"]

];