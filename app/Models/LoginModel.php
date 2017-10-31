<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:23
 */

namespace Loft\Models;
/*
Работа с данными
 * */

class LoginModel extends Model
{
    private function getDataFromDB()
    {
        // Заносим в переменные данные о логине и пароле которые прислал пользователь
        $login = strtolower($_POST['login']);
        $password = $_POST['password'];

        // Шаблон SQL запроса
        $sql = 'SELECT * FROM users
	    WHERE 
		  login = :login AND
		  password = :password AND
		  active = 1';

        // Передаём запрос к выполнению методом PDO
        $res = $this->db->prepare($sql);

        // Поставляем логин и пароль в массив для дальнейшей обработки
        $data = ['login' => $login, 'password' => $password];
        // подготавлеваем данные которые будут подставлятся в sql запрос
        $res->execute($data);

        // Проверяем есть ли совпадения, если да, записываем сессию
        if ($res->rowCount() == true) {
            $users = $res->fetchAll();
//            $_SESSION['id'] = $users[0] ['id'];
            $_SESSION['login'] = $users[0] ['login'];
            $_SESSION['auth'] = true;
            return true;
            // Если нет совпадений, возвращаем лож
        } else {
            return false;
        }
    }

    public function Auth()
    {
        $loginModel = new LoginModel();
        $loginModel->getDataFromDB();
        if (isset($_SESSION['login'])) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }
}