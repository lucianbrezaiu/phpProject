<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 04-Feb-19
 * Time: 15:35
 */

namespace App\Controllers;

use App\Models\Project;
use Framework\BaseController;
use App\Models\User;

class AdminController extends BaseController
{

    /**
     * Functia insereaza un nou cont de utilizator in aplicatie.
     */
    public function register(): void
    {
        if (!$this->validForm($_POST["email"], $_POST["password"])) {
            $_SESSION["message"] = "INVALID DATA!";
            header("Location: /administrator/addAccount");
            return;
        }


        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $username = $_POST["userName"];
        $email = $_POST["email"];
        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $function = $_POST["function"];

        $user = new User();
        $result = $user->find(["Email" => $email]);
        if (is_object($result)) {
            $_SESSION["message"] = "EMAIL ADDRESS ALREADY EXITS!";
            header("Location: /administrator/addAccount");
            return;
        }

        $_SESSION["message"] = "OPERATION SUCCESSFULLY COMPLETED!";
        $user->new(["FirstName"=>$firstName,"LastName"=>$lastName,"Username"=>$username,"Email"=>$email,"Password"=>$hashedPassword,"Function"=>$function]);
        header("Location: /administrator/addAccount");
    }

    /**
     * Functia sterge un cont utilizator din aplicatie.
     */
    public function remove(): void
    {
        if (!$_SESSION["email"]) {
            header("Location: /administrator/deleteAccount");
            return;
        }

        $criterion = $_POST["criterion"];
        $field = $_POST["field"];

        if (($criterion == "ID" && !is_numeric($field)) || ($criterion == "Email" && !$this->validEmail($field))) {

            $_SESSION["message"] = "INVALID FIELD!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        $user = new User();
        $result = $user->find([$criterion => $field]);

        if (is_bool($result) && $result === false) {
            $_SESSION["message"] = "THERE IS NO EMPLOYEE!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        if (is_object($result) && $result->ID === $_SESSION["ID"]) {
            $_SESSION["message"] = "ERROR, YOU CAN'T ERASE YOURSERLF!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        $_SESSION["message"] = "OPERATION SUCCESSFULLY COMPLETED!";
        $user->delete($result->ID);
        header("Location: /administrator/deleteAccount");
    }

    /**
     * Functia adauga un nou proiect in baza de date a aplicatiei.
     */
    public function addProject(): void
    {
        $name = $_POST["name"];
        $startDate = $_POST["startDate"];
        $endDate = $_POST["endDate"];
        $budget = $_POST["budget"];
        $idEmployee = $_POST["employee"];

        if (!is_numeric($budget) || !is_numeric($idEmployee)) {
            $_SESSION["message"] = "INVALID DATA!";
            header("Location: /administrator/project");
            return;
        }

        $user = new User();
        $result = $user->find(["ID" => $idEmployee]);
        if (is_bool($result) || $result->Function !== "employee") {
            $_SESSION["message"] = "THERE IS NO EMPLOYEE!";
            header("Location: /administrator/project");
            return;
        }

        $project = new Project();
        $project->new(["Name" => $name, "StartDate" => $startDate, "EndDate" => $endDate, "Budget" => $budget, "Employee" => $idEmployee]);
        $_SESSION["message"] = "OPERATION SUCCESSFULLY COMPLETED!";
        header("Location: /administrator/project");
    }
}