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
                   unset( $_SESSION["message"]);
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

//    public function showAction($id)
//    {
//        echo "Hai" . $id;
//        //return $this->view("user/show.html",["name" => "Alex"]);
//    }

}