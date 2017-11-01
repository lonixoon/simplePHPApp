<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Models\MainModel;
use Loft\Template;

class MainController
{
    public function index()
    {
        $content = Template::render('Views/Main/main.tpl.php', []);

        $vars = [
            'titlePage' => 'Основная страница',
            'content' => $content,
            'header' => '',
            'footer' => ''
        ];

        echo Template::render('Views/index.tpl.php', $vars);
    }

    public function showFeedback()
    {

        $this->index();
        $mainModel = New MainModel();
        $showFeedback = $mainModel->getFeedbackDB();
        dump($showFeedback);
        foreach ($showFeedback as $value) {
            echo '<p>' . $value . '</p>';
        }
//        echo '<div class="alert alert-info"><p>' . $showFeedback[0]['name'] . '</p><p>' . $showFeedback[0]['email'] . '</p><p>' . $showFeedback[0]['text'] . '</p></div>';
//        echo '<div class="alert alert-info"><p>' . $showFeedback[1]['name'] . '</p><p>' . $showFeedback[1]['email'] . '</p><p>' . $showFeedback[1]['text'] . '</p></div>';
//        echo '<div class="alert alert-info"><p>' . $showFeedback[2]['name'] . '</p><p>' . $showFeedback[2]['email'] . '</p><p>' . $showFeedback[2]['text'] . '</p></div>';
    }

}