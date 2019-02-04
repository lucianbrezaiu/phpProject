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

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

}