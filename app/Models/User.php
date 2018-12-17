<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 17-Dec-18
 * Time: 12:35
 */

namespace App\Models;

class User
{
    private $id;
    private $name;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getID() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function __toString() : string
    {
        return "[id:" . $this->id . "]";
    }
}