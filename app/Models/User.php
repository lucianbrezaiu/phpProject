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

    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;
    private $function;

    /**
     * Functia returneaza un array asociativ cu coloanele si valorile unui user.
     */
    public function wrap()
    {
        $array = [
            "FirstName" => $this->firstName,
            "LastName" => $this->lastName,
            "Username" => $this->username,
            "Email" => $this->email,
            "Password" => $this->password,
            "Function" => $this->function

        ];
        return $array;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $function
     */
    public function setFunction($function): void
    {
        $this->function = $function;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->function;
    }



    public function __toString() : string
    {
        return "[id:" . $this->id . ", ".$this->username.", email: ".$this.$this->email."]";
    }
}