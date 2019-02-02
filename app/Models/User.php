<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 17-Dec-18
 * Time: 12:35
 */

namespace App\Models;
use Framework\Model;

class User extends Model
{
    protected $table = "User";

    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($id,$username,$email,$password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function __toString() : string
    {
        return "[id:" . $this->id . ", ".$this->username.", email: ".$this.$this->email."]";
    }
}