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

    public function showAction($id)
    {
        echo "Hai" . $id;
        //return $this->view("user/show.html",["name" => "Alex"]);
    }

}