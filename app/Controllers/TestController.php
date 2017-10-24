<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Models\TestModel;

class TestController
{
    public function index()
    {
        echo 'Тестовая страница';
        // получаем данные из ДБ и выводим
        echo $this->getData();

}
    public function getData(){
        $testModel = new TestModel();
       return $testModel->getDataFromDB();
    }
}