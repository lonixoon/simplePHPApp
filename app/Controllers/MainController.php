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
        $this->render();
        $this->showFeedback();
    }

    // Выводит основной шаблон статический шаблон
    public function render()
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

    // Выдовод данных из базы
    public function showFeedback()
    {
        $mainModel = New MainModel();
        // Получаем данные из базы ввиде вложенныех массивов
        $showFeedback = $mainModel->getFeedbackDB();
//        dump($showFeedback);
        // Распаковка вложенных массивов, $a содержит первый элемент вложенного массива и т.д.
        echo '<div class="row">';
        foreach ($showFeedback as list($a, $b, $c)) {
            // $a содержит первый элемент вложенного массива,
            // а $b содержит второй элемент.
            echo
                '<div class="col-3 alert alert-info">
                   <p class="alert alert-primary">' . $a . '</p>
                   <p class="alert alert-primary">' . $b . '</p>
                   <p class="alert alert-primary">' . $c . '</p>
                </div>';
        }
        echo '</div>';
    }
}