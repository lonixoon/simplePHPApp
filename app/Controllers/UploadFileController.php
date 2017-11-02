<?php
/**
 * Created by PhpStorm.
 * User: RUS9211689
 * Date: 02.11.2017
 * Time: 10:40
 */

namespace Loft\Controllers;


use Loft\Models\UploadFileModel;
use Loft\Template;

class UploadFileController extends Controller
{
    // функция по умолчнию при попадании на страницу /feedback
    public function index()
    {
        $this->render();
    }

    // Отправка отзыва в базу /feedbackSend
    public function uploadSend()
    {
        $feedback = New UploadFileModel();
        // Добавляем отзыв в базу
        $feedback->sendFeedbackDB();
        $feedback->checkFile();
        dump($_POST['name']);
        dump($_FILES['img']);
        print_r($_FILES['img']);
        // Меняем заголов на главную страницу
//        header('location: /');
//        $index = New MainController();
//        $index->index();
//        echo '<p class="alert alert-success">Спасибо за отзыв!</p>';
    }

    private function render()
    {
        $content = Template::render('Views/UploadFile/upload.tpl.php',[]);

        $vars =[
            'titlePage'=>'Форма отзыва',
            'header'=>'',
            'content'=>$content
        ];

        echo Template::render('Views/index.tpl.php',$vars);
    }
}