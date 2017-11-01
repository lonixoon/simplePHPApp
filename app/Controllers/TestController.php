<?php

namespace Loft\Controllers;
use Loft\Models\LoginModel;
use Loft\Template;
use Loft\Models\TestModel;

class TestController
{
//    public function index()
//    {
//        echo 'Тестовая страница';
//        // получаем данные из ДБ и выводим
//        echo $this->getData();
//    }

    public function index()
    {
//        $content = Template::render('Views/Feedback/form.tpl.php',[]);

        $vars =[
            'titlePage'=>'Форма отзыва',
            'header'=>'Тест',
            'content'=>'Тест'
        ];

        echo Template::render('Views/index.tpl.php',$vars);
    }
}