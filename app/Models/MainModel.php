<?php
/**
 * Created by PhpStorm.
 * User: RUS9211689
 * Date: 01.11.2017
 * Time: 13:40
 */

namespace Loft\Models;
use PDO;

class MainModel extends Model
{
    public function getFeedbackDB()
    {
        $sql = 'SELECT name, email, text FROM feedback';
        $res = $this->db->query($sql);
//        $res = $this->db->prepare($sql);
//        $res ->execute();
//        dump(['res' => $res]);
//        dump(['result' => $result]);
//        $result = $res ->fetchAll(PDO::FETCH_COLUMN, 1);
        $result = $res ->fetchAll();
        return $result;
    }
}