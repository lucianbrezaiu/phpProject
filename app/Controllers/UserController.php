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
       public function loginUser()
       {
           session_start();
           $email = $_POST["email"];
           $password = $_POST["password"];

           if(!$this->validForm($email,$password)) {
               $_SESSION["message"] = "formularul nu este valid!";
               header("Location: /");
           }
           else
           {
               $user = new User();
               $result = $user->find(["Email" => $email]);
               if ($result === false)
               {
                   $_SESSION["message"] = "nu exista email";
                   header("Location: /");
               }
               elseif (!password_verify($password,$result->Password)
               ) {
                   $_SESSION["message"] = "parola gresita";
                   header("Location: /");
               }
               else
               {
                   $_SESSION["FirstName"] = $result->FirstName;
                   $_SESSION["LastName"] = $result->LastName;
                   $_SESSION["Email"] = $result->Email;
                   switch ($result->Function)
                   {
                       case "administrator":
                           header("Location: /administrator");
                           break;
                       case "employee":
                           header("Location: /employee");
                           break;
                   }
               }
           }
       }

       public function registerUser()
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

        private function validForm($email,$password) : bool
        {
            if(!$this->validEmail($email))
            {
                return false;
            }

            if(!$this->validPassword($password))
            {
                return false;
            }

            return true;
        }

        private function validEmail($email) : bool
        {
            if($email == null)
            {
                return false;
            }

            if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
            {
                return false;
            }

            return true;

        }

        private function validPassword($password) : bool
        {
            if($password == null)
            {
                return false;
            }

            if(strlen($password)<6)
            {
                return false;
            }

            return true;
        }


//    public function showAction($id)
//    {
//        echo "Hai" . $id;
//        //return $this->view("user/show.html",["name" => "Alex"]);
//    }

}