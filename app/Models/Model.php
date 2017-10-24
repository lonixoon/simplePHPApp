<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:23
 */

namespace Loft\Models;


use PDO;

class Model
{
    public $db;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->db= new PDO("mysql:host={DB['host']};dbname={DB['name']}", DB['user'], DB['password']);
    }
}