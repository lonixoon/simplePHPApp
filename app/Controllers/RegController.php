<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:14
 */

namespace Loft\Controllers;

use Loft\Models\RegModel;
use Loft\Template;

class RegController
{
    private $content;
    private $vars;

    public function index()
    {
        $this->content = Template::render('Views/Reg/reg.tpl.php', []);

        $this->vars = [
            'titlePage' => 'Регистрация',
            'content' => $this->content,
            'header' => '',
            'footer' => ''
        ];

        echo Template::render('Views/index.tpl.php', $this->vars);
    }

    public function reg()
    {
        $reg = new RegModel();
        if ($reg->sendDataDB()) {
            $auhPage = new LoginController();
            $auhPage->index();
            echo '<p class="alert alert-success">Пользователь зареган!</p>';
        } else {
            $this->index();
            echo '<div class="alert alert-danger">Такой пользователь уже есть</div>';
        }
    }
}