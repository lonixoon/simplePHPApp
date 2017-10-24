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
        $form = Template::render('Views/form.tpl.php',[]);

        $vars =[
            'titlePage'=>'Основная страница',
            'content'=>$form,
            'header'=>'шапка'
        ];

       echo Template::render('Views/main.tpl.php',$vars);
}
}