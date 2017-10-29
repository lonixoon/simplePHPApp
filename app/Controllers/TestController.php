<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

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
//
//        $content = $this->getData();
//        dump($content);
//        $vars =[
//            'titlePage'=>'Тест',
//            'content'=>$content,
//            'header'=> 'Тест',
//            'footer' => ''
//        ];

        echo $this->getData();
//        echo Template::render('Views/main.tpl.php',$vars);
    }

    public function getData()
    {
//        $testModel = new TestModel();
//        return $testModel->getDataFromDB();
        $testModel = new LoginModel();
        return $testModel->getDataFromDB();
    }
}