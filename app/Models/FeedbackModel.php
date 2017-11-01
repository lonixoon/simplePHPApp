<?php
/**
 * Created by PhpStorm.
 * User: RUS9211689
 * Date: 01.11.2017
 * Time: 11:56
 */

namespace Loft\Models;


class FeedbackModel extends Model
{
    private $name;
    private $email;
    private $text;

    public function sendFeedbackDB()
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->text = $_POST['text'];

        $sql = 'INSERT INTO feedback (name, email, text) VALUES (:name, :email, :text)';
        $res = $this->db->prepare($sql);
        $data = ['name' => $this->name, 'email' => $this->email, 'text' => $this->text,];
        $res->execute($data);
    }
}