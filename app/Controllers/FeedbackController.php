<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Models\FeedbackModel;
use Loft\Template;

class FeedbackController
{
    // функция по умолчнию при попадании на страницу /feedback
    public function index()
    {
        $this->render();
    }

    // Отправка отзыва в базу /feedbackSend
    public function feedbackSend()
    {
        $feedback = New FeedbackModel();
        // Добавляем отзыв в базу
        $feedback->sendFeedbackDB();
        // Меняем заголов на главную страницу
        header('location: /');
//        $index = New MainController();
//        $index->index();
        echo '<p class="alert alert-success">Спасибо за отзыв!</p>';
    }

    private function render()
    {
        $content = Template::render('Views/Feedback/form.tpl.php',[]);

        $vars =[
            'titlePage'=>'Форма отзыва',
            'header'=>'',
            'content'=>$content
        ];

       echo Template::render('Views/index.tpl.php',$vars);
    }


}