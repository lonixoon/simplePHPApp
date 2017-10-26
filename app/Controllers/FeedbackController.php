<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Template;

class FeedbackController
{
    public function index()
    {
        $content = Template::render('Views/form.tpl.php',[]);

        $vars =[
            'titlePage'=>'Форма отзыва',
            'header'=>'',
            'content'=>$content
        ];

       echo Template::render('Views/main.tpl.php',$vars);
    }
}