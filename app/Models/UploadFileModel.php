<?php
/**
 * Created by PhpStorm.
 * User: RUS9211689
 * Date: 02.11.2017
 * Time: 10:39
 */

namespace Loft\Models;


class UploadFileModel extends Model
{
    private $name;
    private $img;

//    private $text;

    public function sendFeedbackDB()
    {
        $this->name = $_POST['name'];
        $this->img = $_FILES['img'];
//        $this->text = $_POST['text'];

        $sql = 'INSERT INTO upload (name, img) VALUES (:name, :img)';
        $res = $this->db->prepare($sql);
        $data = ['name' => $this->name, 'img' => $this->img];
        $res->execute($data);
    }

    // Проверка файла перез загрузкой
    public function checkFile()
    {
        // Пришедший файл
        $file = $_FILES['img'];
        // Его формат
        $fileType = $file['type'];
        // Его размер
        $fileSize = $file['size'];
        // Папка для хренения картинок
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/';
        // Есть ли файл?
        if (empty($file)) {
            exit('Нет файла');
        }
        // Коректен ли формат файла?
        if ($fileType != 'image/gif' && $fileType != 'image/jpeg' && $fileType != 'image/png') {
            exit('Не корректный формат файла(первая проверка)');
        }
        // Его данные во временном хранилище
        $fileGetImageSize = getimagesize($file['tmp_name']);
        // Его формат из данных временного хранилища
        $fileType2 = $fileGetImageSize['mime'];
        //Коректен ли формат файла? (дополнительная проверка)
        if ($fileType2 != 'image/gif' && $fileType2 != 'image/jpeg' && $fileType2 != 'image/png') {
            exit('Не корректный формат файла(вторая проверка)');
        }
        // Проверка на размер файла, если размер равен нулю или больше указанного -> ошибка
        if ($fileSize == 0 || $fileSize > 2000000) {
            exit('Большой файл');
        }
        // Проверка на существование папки на сервере
        if (!file_exists($filePath)) {
            // Если папки нет, создаём
            mkdir($filePath, 777);
        }

        // Заберам формат файла (всё что после точки) и приведём в нижний реестр
        $type = strtolower(strrchr($file['name'], '.'));
        // Создаём уникальное имя файла
        $fileName = uniqid('img_');
        // Создаём путь до дириктории куда должен сохранятся файл на сервере
        $fileDist = $filePath . $fileName . $type;
        // Перемещаем файл в указанную выше дирректорию из временного хранилища
        if (!move_uploaded_file($file['tmp_name'], $fileDist)) {
            // Если файл не перемистится -> ошибка
            exit('Ошибка сохранения');
        }
    }
}