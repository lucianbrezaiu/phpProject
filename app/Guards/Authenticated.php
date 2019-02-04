<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 07-Jan-19
 * Time: 13:09
 */

namespace App\Guards;

use Framework\Guard;

class Authenticated implements Guard
{
    public function handle(array $params = null) : bool
    {
        session_start();
        if (!isset($_SESSION['Email']))
        {
            $_SESSION["message"] = "Denied access!";
            $this->reject();
            return false;
        }
        return true;
    }

    public function reject()
    {
        header("Location: /");
    }
}