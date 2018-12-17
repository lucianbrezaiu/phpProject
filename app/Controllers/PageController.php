<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 25-Nov-18
 * Time: 23:23
 */

namespace App\Controllers;

use Framework\BaseController;

class PageController extends BaseController
{
    public function aboutUsAction()
    {
        echo '<br>hello from aboutUsAction() from class PageController!';
    }
}