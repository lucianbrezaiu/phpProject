<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 23:24
 */

namespace App\Controllers;

use App\Models\User;
use Framework\BaseController;

class UserController extends BaseController
{
    /**
     * Functia autentifica un utilizator in aplicatie, pornind o noua sesiune.
     */
    public function loginUser(): void
    {
        session_start();
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!$this->validForm($email, $password)) {
            $_SESSION["message"] = "INVALID DATA!";
            header("Location: /login");
            return;
        }

        $user = new User();
        $result = $user->find(["Email" => $email]);
        if ($result === false) {
            $_SESSION["message"] = "EMAIL ADDRESS DOESN'T EXIST";
            header("Location: /login");
            return;
        }

        if (!password_verify($password, $result->Password)) {
            $_SESSION["message"] = "WRONG PASSWORD!";
            header("Location: /login");
            return;
        }

        $_SESSION["ID"] = $result->ID;
        $_SESSION["FirstName"] = $result->FirstName;
        $_SESSION["LastName"] = $result->LastName;
        $_SESSION["Email"] = $result->Email;
        unset($_SESSION["message"]);
        switch ($result->Function) {
            case "administrator":
                header("Location: /administrator");
                break;
            case "employee":
                header("Location: /employee");
                break;
        }
    }


    /**
     * Functia distruge sesiunea curenta si incarca pagina principala reprezentand iesirea de pe un cont.
     */
    public function logout(): void
    {
        session_destroy();
        header("Location: /");
    }

}