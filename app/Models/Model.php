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
        try {
//            $this->db = new PDO("mysql:host=127.0.0.1:3306;dbname=backend", 'root', '');
            $this->db = new PDO(DB['dsn'], DB['user'], DB['password']);
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage() . '<br>';
        }
    }
}