<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;


use Loft\Template;

class MainController
{
    public function index()
    {
        $vars =[
            'titlePage'=>'Основная страница',
            'content'=>'Это основная страница'
        ];
       echo Template::render('Views/main.tpl.php',$vars);
}
}