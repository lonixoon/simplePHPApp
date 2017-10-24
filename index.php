<?php
namespace Loft;
use Loft\Core;

// Композер
require 'vendor/autoload.php';

// Подключаем файл конфигурации
require 'app/config.php';

// Подключаем список маршрутов
require 'app/routes.php';


// Узнаем путь с которого пришел запрос
$uri  = $_SERVER['REQUEST_URI'];

// Создаем роутер управляющий нашим приложением
$router = new Router(ROUTES,$uri);

// Запускаем обработку входящего пути
$router->run();

