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
    /**
     * Functia verifica daca o anumita ruta este accesibila pentru un utilizator.
     */
    public function handle(array $params = null): bool
    {
        session_start();
        if (!isset($_SESSION['Email'])) {
            $_SESSION["message"] = "ACCESS DENIED!";
            $this->reject();
            return false;
        }
        return true;
    }

    /**
     * Functia face redirectare catre pagina de home daca ruta nu este accesibila.
     */
    public function reject(): void
    {
        header("Location: /");
    }
}