<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 03-Dec-18
 * Time: 13:39
 */

namespace Framework;

class BaseController
{
    private $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../app/Views');
        $this->twig = new \Twig_Environment($loader, array(
//            'cache' => __DIR__ . '/../storage/cache/views',
        ));
    }

    /**
     * Functia incarca o pagina cu numele $viewFile;
     */
    public function view(string $viewFile, array $params=[]) : void
    {
        echo $this->twig->render($viewFile,$params);
    }

    /**
     * Functia afiseaza un mesaj.
     */
    public function alert($msg) : void
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    /**
     * Functia verifica corectitudinea datelor unui formular.
     */
    protected function validForm($email,$password) : bool
    {
        if(!$this->validEmail($email) || !$this->validPassword($password))
        {
            return false;
        }

        return true;
    }

    /**
     * Functia valideaza campul de email.
     */
    protected function validEmail($email) : bool
    {
        if(!$email || !filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return false;
        }

        return true;

    }

    /**
     * Functia valideaza campul de parola.
     */
    protected function validPassword($password) : bool
    {
        if(!$password || strlen($password)<6)
        {
            return false;
        }

        return true;
    }



}