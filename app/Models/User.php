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
    protected $table = "user";

    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;
    private $function;

    /**
     * Functia seteaza valoarea lui $firstName.
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Functia seteaza valoarea lui $lastName.
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Functia seteaza valoarea lui $username.
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * Functia seteaza valoarea lui $email.
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * Functia seteaza valoarea lui $password.
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * Functia seteaza valoarea lui $function.
     */
    public function setFunction($function): void
    {
        $this->function = $function;
    }

    /**
     * Functia returneaza valoarea lui $firstName.
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Functia returneaza valoarea lui $lastName.
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Functia returneaza valoarea lui $username.
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Functia returneaza valoarea lui $email.
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Functia returneaza valoarea lui $password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Functia returneaza valoarea lui $function.
     */
    public function getFunction() : string
    {
        return $this->function;
    }


}