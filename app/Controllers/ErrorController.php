<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Template;

class ErrorController
{
    public function index()
    {
        $vars = [
            'titlePage'=>'Error 404',
            'header'=>'',
            'content'=>'<h1>Ой! Что то пошло не так :-(</h1><a href="/">Вернёмся на главную?</a>'
        ];

       echo Template::render('Views/main.tpl.php',$vars);
    }
}