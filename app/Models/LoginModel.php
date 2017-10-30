<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:23
 */

namespace Loft\Models;


class LoginModel extends Model
{
    public function getDataFromDB()
    {
        $login = strtolower($_POST['login']);
        $password = $_POST['password'];

        $sql = 'SELECT * FROM users
	    WHERE 
		  login = :login AND
		  password = :password AND
		  active = 1';

        $data = ['login' => $login, 'password' => $password];
        $res = $this->db->prepare($sql); // подготавлваем запрос к выполнению методом PDO
        $res->execute($data); // подготавлеваем данные которые будут подставлятся в sql запрос

        if ($res->rowCount() == 1) {
            $users = $res->fetchAll();
//            dump(['dataDB', $users]);
            $_SESSION['id'] = $users[0] ['id'];
            $_SESSION['login'] = $users[0] ['login'];
            $_SESSION['auth'] = true;
            return true;
        } else {
//            dump(['No dataDB']);
            return false;
        }
    }

    public function Auth()
    {
        $loginModel = new LoginModel();
        $loginModel->getDataFromDB();
        if (isset($_SESSION['auth'])) {
            return $_SESSION['auth'];
        } else {
            return false;
        }
    }
}