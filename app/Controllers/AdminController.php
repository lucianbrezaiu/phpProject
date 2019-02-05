<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 04-Feb-19
 * Time: 15:35
 */

namespace App\Controllers;

use Framework\BaseController;
use App\Models\User;

class AdminController extends BaseController
{


    /**
     * Functia insereaza un nou cont de utilizator in aplicatie.
     */
    public function register() : void
    {
        if(!$this->validForm($_POST["email"],$_POST["password"]))
        {
            $_SESSION["message"] = "Email sau parola invalida!";
            header("Location: /administrator/addAccount");
            return;
        }

        $user = new User();
        $user->setFirstName($_POST["firstName"]);
        $user->setLastName($_POST["lastName"]);
        $user->setUserName($_POST["userName"]);
        $user->setEmail($_POST["email"]);
        $hashedPassword = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $user->setPassword($hashedPassword);
        $user->setFunction($_POST["function"]);

        $result = $user->find(["Email" => $user->getEmail()]);
        if (is_object($result))
        {
            $_SESSION["message"] = "Adresa de email deja exista!";
            header("Location: /administrator/addAccount");
            return;
        }

        $_SESSION["message"] = "Operatie incheiata cu succes!";
        $user->new($user->wrap());
        header("Location: /administrator/addAccount");
    }

    /**
     * Functia verifica ca formularul din pagina de stergere cont sa fie completat cu date corecte.
     */
    private function valid($criterion,$field) : bool
    {
        if(($criterion=="ID" && !is_numeric($field)) || ($criterion=="Email" && !$this->validEmail( $field)))
        {
               return false;
        }
        return true;
    }

    /**
     * Functia sterge un cont utilizator din aplicatie.
     */
    public function remove() : void
    {
        $criterion = $_POST["criterion"];
        $field = $_POST["field"];

        if(!$this->valid($criterion,$field))
        {

            $_SESSION["message"] = "Email sau parola invalida!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        $user = new User();
        $result = $user->find([$criterion => $field]);

        if(is_bool($result) && $result===false)
        {
            $_SESSION["message"] = "Nu exista astfel de inregistrare!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        if(is_object($result) && $result->ID === $_SESSION["ID"])
        {
            $_SESSION["message"] = "Eroare, nu te poti sterge singur!";
            header("Location: /administrator/deleteAccount");
            return;
        }

        $_SESSION["message"] = "Operatie incheiata cu succes!";
        $user->delete($result->ID);
        header("Location: /administrator/deleteAccount");
    }
}