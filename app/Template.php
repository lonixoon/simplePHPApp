<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 12:29
 */

namespace Loft;


class Template
{
    public static function render (string $pathToTemplate, array $vars)
    {
        ob_start();
        extract($vars);
        require $pathToTemplate;
        return ob_get_clean();
    }
}