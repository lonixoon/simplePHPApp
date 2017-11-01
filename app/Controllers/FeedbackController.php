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
    public function index()
    {
        $content = Template::render('Views/Feedback/form.tpl.php',[]);

        $vars =[
            'titlePage'=>'Форма отзыва',
            'header'=>'',
            'content'=>$content
        ];

       echo Template::render('Views/index.tpl.php',$vars);
    }

    public function feedbackSend()
    {
        $feedback = New FeedbackModel();
        $feedback->sendFeedbackDB();
        $index = New MainController();
        $index->showFeedback();
        echo '<p class="alert alert-success">Спасибо за отзыв!</p>';

    }
}