<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Template;

class LoginController
{
    public function index()
    {

        if ($this->isPost()) {
        } else {
            $loginForm = Template::render('Views/login.tpl.php', []);

            echo Template::render(
                'Views/main.tpl.php', [
                'content' => $loginForm
            ]);
        }


    }

    public function isPost()
    {
        return isset($_POST['user']);
    }

}