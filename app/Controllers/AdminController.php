<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 04-Feb-19
 * Time: 15:35
 */

namespace App\Controllers;

use Framework\BaseController;

class AdminController extends BaseController
{
    public function logoutAdmin()
    {
        session_destroy();
        header("Location: /");
    }
}