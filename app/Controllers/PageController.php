<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 23:23
 */

namespace App\Controllers;

use App\Models\User;
use App\Models\Project;
use Framework\BaseController;


class PageController extends BaseController
{
    /**
     * Functia incarca pagina de home a aplicatiei.
     */
    public function loadHomepage(): void
    {
        $this->view("root/home.html");
    }

    /**
     * Functia incarca pagina de login a aplicatiei.
     */
    public function loadLoginPage(): void
    {
        session_start();
        $this->view("root/login.html");
        if (isset($_SESSION["message"])) {
            $this->alert($_SESSION["message"]);
            unset($_SESSION["message"]);
        }
        session_destroy();
    }

    /**
     * Functia incarca pagina de home a unui administrator.
     */
    public function loadAdminPage(): void
    {
        if (isset($_SESSION["FirstName"]) && isset($_SESSION["LastName"])) {
            $this->view("administrator/homeAdmin.html", ["admin" => $_SESSION["FirstName"] . " " . $_SESSION["LastName"]]);
            if (isset($_SESSION["message"])) {
                $this->alert($_SESSION["message"]);
                unset($_SESSION["message"]);
            }
        }
    }

    /**
     * Functia incarca pagina de adaugare de cont pentru un administrator.
     */
    public function loadAddAccountPage(): void
    {
        $this->view("administrator/addUser.html");
        if (isset($_SESSION["message"])) {
            $this->alert($_SESSION["message"]);
            unset($_SESSION["message"]);
        }
    }

    /**
     * Functia incarca pagina de stergere de cont pentru un administrator.
     */
    public function loadDeleteAccountPage(): void
    {
        $user = new User();
        $result = $user->getAll();
        $this->view("administrator/deleteUser.html", ["users" => $result]);
        if (isset($_SESSION["message"])) {
            $this->alert($_SESSION["message"]);
            unset($_SESSION["message"]);
        }
    }

    /**
     * Functia incarca pagina de adaugare de proiect pentru un administrator.
     */
    public function loadAddProjectPage(): void
    {
        $user = new User();
        $result = $user->getAll();

        $this->view("administrator/addProject.html", ["users" => $result]);
        if (isset($_SESSION["message"])) {
            $this->alert($_SESSION["message"]);
            unset($_SESSION["message"]);
        }
    }

    /**
     * Functia incarca pagina de home a unui angajat.
     */
    public function loadEmployeePage(): void
    {
        $this->view("employee/homeEmployee.html");
    }

    /**
     * Functia incarca pagina unui site extern.
     */
    public function redirect(): void
    {
        header("Location: https://new.siemens.com/ro/ro.html");
    }

    /**
     * Functia incarca pagina cu datele personale pentru un angajat.
     */
    public function loadPersonalPage(): void
    {
        $user = new User();
        $result = $user->find(["ID" => $_SESSION["ID"]]);
        $this->view("employee/personalData.html", ["user" => $result]);
    }

    /**
     * Functia incarca pagina cu proiectele personale ale unui angajat.
     */
    public function loadProjectsPage(): void
    {
        $project = new Project();
        $result = $project->getAll();
        $this->view("employee/projects.html", ["projects" => $result, "currentID" => $_SESSION["ID"]]);
    }
}