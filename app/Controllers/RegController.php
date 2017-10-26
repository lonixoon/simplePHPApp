<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Template;

class RegController
{
    public function index()
    {
        $content = Template::render('Views/reg.tpl.php',[]);

        $vars =[
            'titlePage'=>'Регистрация',
            'content'=>$content,
            'header'=> '',
            'footer' => ''
        ];

        echo Template::render('Views/main.tpl.php',$vars);
    }
}