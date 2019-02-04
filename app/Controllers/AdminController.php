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
    public function logout()
    {
        session_destroy();
        header("Location: /");
    }

    public function register()
    {
        if(!$this->validForm($_POST["email"],$_POST["password"]))
        {
            $_SESSION["message"] = "Email sau parola invalida!";
        }
        else
        {
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
            }
            else
            {
                $_SESSION["message"] = "Operatie incheiata cu succes!";
                $user->new($user->wrap());
            }
        }
        header("Location: /administrator");
    }

}