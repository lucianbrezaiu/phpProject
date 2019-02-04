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

    public function view(string $viewFile, array $params=[])
    {
        echo $this->twig->render($viewFile,$params);
    }

    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    protected function validForm($email,$password) : bool
    {
        if(!$this->validEmail($email))
        {
            return false;
        }

        if(!$this->validPassword($password))
        {
            return false;
        }

        return true;
    }

    protected function validEmail($email) : bool
    {
        if($email == null)
        {
            return false;
        }

        if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
        {
            return false;
        }

        return true;

    }

    protected function validPassword($password) : bool
    {
        if($password == null)
        {
            return false;
        }

        if(strlen($password)<6)
        {
            return false;
        }

        return true;
    }



}