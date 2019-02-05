<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 23:23
 */

namespace App\Controllers;

use App\Models\User;
use Framework\BaseController;


class PageController extends BaseController
{

    public function loadHomepage() : void
    {
        $this->view("root/home.html");
    }

    public function loadLoginPage() : void
    {
        session_start();
        $this->view("root/login.html");
        if(isset($_SESSION["message"]))
        {
            $this->alert( $_SESSION["message"]);
            unset( $_SESSION["message"]);
        }
        session_destroy();
    }

    public function loadAdminPage() : void
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

    public function loadAddAccountPage() : void
    {
        $this->view("administrator/addUser.html");
        if(isset($_SESSION["message"]))
        {
            $this->alert( $_SESSION["message"]);
            unset( $_SESSION["message"]);
        }
    }

    public function loadDeleteAccountPage() : void
    {
        $user = new User();
        $result = $user->getAll();
        $this->view("administrator/deleteUser.html",["users" => $result]);
        if(isset($_SESSION["message"]))
        {
            $this->alert( $_SESSION["message"]);
            unset( $_SESSION["message"]);
        }
    }


    public function loadEmployeePage() : void
    {
        $this->view("employee/homeEmployee.html");
    }

    /**
     * Functia incarca un site extern.
     */
    public function redirect()
    {
        header("Location: https://new.siemens.com/ro/ro.html");
    }

    public function loadPersonalPage()
    {
        $user = new User();
        $result = $user->find(["ID" => $_SESSION["ID"]]);
        $this->view("employee/personalData.html",["user" => $result]);
    }

    public function loadProjectsPage()
    {
        // trebuie sa trimit proiectele userului curent
        $this->view("employee/projects.html");
    }
}