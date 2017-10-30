<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 8:53
 */

namespace Loft;
use Loft\Controllers\LoginController;
use Loft\Models\LoginModel;
use Loft\Models\LoginModelNew;

class Router
{
    // массив с маршрутами
    private $routes;
    private $uri;

    /**
     * Router constructor.
     * @param array $routes
     * @param string $uri
     */
    public function __construct(array $routes, string $uri)
    {
        $this->routes = $routes;
        $this->uri = $uri;
    }

    /**
     *
     */
    public function run()
    {
        // Записываем в бувер, что бы можно было изменить URI (ob_end_flush() - выдвод из буфера если их несколько)
         ob_start();
        // Проверяем адрес,
        // Нет -> перекидываем на 404 станицу
        if (!$this->isFoundRoute()) {
            header('Location: /404');
//            $this->uri = '/404'; // отрисовываем 404 страницу (без перехада не неё)
            exit;

        } // Если адрес есть -> Проверяем на запрещённые без авторизации
        else {
            // Требуется авторизация?
            if (in_array($this->uri, AUTH_ROUTES)) {
                // Авторизован -> Переходим по запросу
                if ($this->isUserAuth()) {
                    // Переходим по запрашиваемому URI
                    $this->runController();

                } // Неавторизован -> Выводим форму авторизации
                else {
                    // Меняем заголовок
                    header('Location: /login');
//                    dump(['Post', $_POST]);

                }
            } // Не требуется авторизация
            else {
                // Переходим по запрашиваемому URI
                $this->runController();
            }
        }


    }

    private function isFoundRoute()
    {
        return array_key_exists($this->uri, $this->routes);
    }

    public function runController()
    {
        // Вычленяем из нашей таблицы маршрутов имя Класса и метода для запуска
        $handler = explode('@', ROUTES[$this->uri]);
        $controllerName = '\Loft\\Controllers\\' . $handler[0];
        $action = $handler[1];

        // Запускаем соотвествующий входящему пути контроллер и метод
        $controller = new $controllerName();
        $controller->$action();

    }

    // проверка авторизации пользователя
    public function isUserAuth()
    {
        $loginModel = new LoginModel();
        $testLogin = $loginModel->Auth();
//        dump(['Result', $testLogin]);
//        dump(['Session', $_SESSION]);
        return $testLogin;
    }

}