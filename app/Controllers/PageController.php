<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 23:23
 */

namespace App\Controllers;

use Framework\BaseController;

class PageController extends BaseController
{
    public function loadLoginPage()
    {
        session_start();
        $this->view("home.html");
        if(isset($_SESSION["message"]))
        {
            $this->alert( $_SESSION["message"]);
            unset( $_SESSION["message"]);
        }
        session_destroy();
    }

    public function loadAdminPage()
    {
        if(isset($_SESSION["FirstName"]) && isset($_SESSION["LastName"]))
        {
            $this->view("administrator/homeAdmin.html",["admin" => $_SESSION["FirstName"]." ".$_SESSION["LastName"]]);
            if(isset($_SESSION["message"]))
            {
                $this->alert( $_SESSION["message"]);
                unset( $_SESSION["message"]);
            }
        }
    }

    public function loadAddAccountPage()
    {
        $this->view("administrator/addUser.html");
    }

    public function loadEmployeePage()
    {
        $this->view("employeePage.html");
    }
}