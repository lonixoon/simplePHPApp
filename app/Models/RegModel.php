<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 31.10.2017
 * Time: 20:24
 */

namespace Loft\Models;


class RegModel extends Model
{
    private $login;
    private $password;

    private function getDataFromDB()
    {
        // Заносим в переменные данные о логине и пароле которые прислал пользователь
        $this->login = strtolower($_POST['loginReg']);
        $this->password = $_POST['passwordReg'];

        // Шаблон SQL запроса
        $sql = 'SELECT * FROM users	WHERE login = :login';

        // Передаём запрос к выполнению методом PDO
        $res = $this->db->prepare($sql);

        // Поставляем логин в массив для дальнейшей обработки
        $data = ['login' => $this->login];
        // подготавлеваем данные которые будут подставлятся в sql запрос
        $res->execute($data);

        // Проверяем есть ли совпадения такой пользователь
        if ($res->rowCount() == true) {
            $res->fetchAll();
            return false;
            // Если нет совпадений
        } else {
            return true;
        }
    }

    public function sendDataDB()
    {
        if ($this->getDataFromDB())
        {
            $sql = 'INSERT INTO users (login, password, active) VALUES (:login, :password, \'1\')';

            $res = $this->db->prepare($sql);
            $data = ['login' => $this->login, 'password' => $this->password];
            $res->execute($data);
            return true;
//            echo '<h1>Пользователь зареган!</h1>';
        } else {
            return false;
//            echo '<h1>Такой пользователь уж есть</h1>';
        }


    }
}