<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 11:23
 */

namespace Loft\Models;


class TestModel extends Model
{

    public function getDataFromDB()
    {
//        return $this->db->exec('ЗДЕСЬ У НАС SQL запрос');
        $sql = 'SELECT * FROM users';
        $result =$this->db->query($sql)->fetchAll();
        dump($result);
        print_r($result);
    }
}