<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

/*
 * Управление страницой
 * */
namespace Loft\Controllers;

use Loft\Template;

class LoginController
{
    public function index()
    {
        $content = Template::render('Views/Auth/login.tpl.php', []);

        $vars = [
            'titlePage' => 'Авторизация',
            'content' => $content,
            'header' => '',
            'footer' => ''
        ];

        echo Template::render('Views/index.tpl.php', $vars);
    }

    public function loginOut()
    {
        $_SESSION = [];
//        $this->index();
        header('location: /');
        echo '<p class="alert alert-success">Пока! Спасибо что зашли к нам в гости :-)</p>';
    }
}