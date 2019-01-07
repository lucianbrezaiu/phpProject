<?php
/**
 * Created by PhpStorm.
 * User: Luci Brezaiu
 * Date: 07-Jan-19
 * Time: 12:56
 */

namespace Framework;


interface Guard
{

    public function handle(array $params = null);

    public function reject();

}