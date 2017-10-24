<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 8:53
 */

namespace Loft;


class Router
{
    // массив с маршрутами
    private $routes;
    private $uri;

    /**
     * Router constructor.
     */
    public function __construct(array $routes, string $uri)
    {
        $this->routes = $routes;
        $this->uri = $uri;
    }

    public function run()
    {
        // Проверяем есть ли у нас такой маршрут, если нет то выводим стартовую страницу
        if (!$this->isFoundRoute()) {
            $this->uri = '/';
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
        $controllerName = '\Loft\\Controllers\\'.$handler[0];
        $action = $handler[1];

        // Запускаем соотвествующий входящему пути контроллер и метод
        $controller = new $controllerName();
        $controller->$action();

    }

}