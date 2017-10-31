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
    public function sendDataDB()
    {
        $login = strtolower($_POST['loginReg']);
        $password = $_POST['passwordReg'];
        $sql = 'INSERT INTO `users` (`login`, `password`, `active`) VALUES (:login, :password, \'1\')';

        $res = $this->db->prepare($sql);
        $data = ['login' => $login, 'password' => $password];
        $res->execute($data);

        echo '<h1>Пользователь зареган!</h1>';
    }
}