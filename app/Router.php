<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 8:53
 */

namespace Loft;

use Loft\Models\LoginModel;

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
        // Записываем в бувер ob_start();, что бы можно было изменить URI (ob_end_flush() - выдвод из буфера если их несколько)

        // Проверяем адрес -> есть такой? -> Отрисовываем запрашиваемую страницу
        if ($this->isFoundRoute()) {
            dump(['login' => $_SESSION['login']]);
            // На страницу требуется авторизация? && Пользователь не авторизован? -> выводим форму авторизации
            if (in_array($this->uri, AUTH_ROUTES) && (!$this->isUserAuth())) {
                $this->uri = '/login';
                // Пользователь авторизован? && Пытается зайти на форму авторизации? -> выводим главную страницу
            } elseif ($this->isUserAuth() && $this->uri == '/login') {
                $this->uri = '/';
            }
        } // Проверяем адрес -> Нет такого? -> Отрисовываем 404 страницу
        else {
            $this->uri = '/404';
        }
        $this->runController();
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
        $mySession = $loginModel->Auth();
//        dump(['Result', $mySession]);
//        dump(['Session', $_SESSION]);
        return $mySession;
    }

}