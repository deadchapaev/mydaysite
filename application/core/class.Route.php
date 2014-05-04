<?php
namespace application\core;

use application\controller\ControllerInfo;

class Route
{

    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'Default';

        $fullurl = $_SERVER['REQUEST_URI'];
        if ((strrpos($fullurl, '?'))) {
            $fullurl = substr($fullurl, 0, strrpos($fullurl, '?'));
        }

        $routes = explode('/', $fullurl);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }
        if ((strcasecmp($controller_name, "api") == 0)) {
            //TODO: здесь будет работа с апи

            include_once '/application/api/processing.php';
        } else {
            // получаем имя экшена
            if (!empty($routes[2])) {
                $action_name = $routes[2];
                if ((strrpos($action_name, '?'))) {
                    $action_name = substr($action_name, 0, strrpos($action_name, '?'));
                }
                if ((strrpos($action_name, '.ws'))) {
                    $action_name = str_replace('.ws', 'Ws', $action_name);
                }
            }

            // подцепляем файл с классом контроллера
            $controller_name = 'application\controller\Controller' . $controller_name;
            // создаем контроллер
            $controller = new $controller_name;
            $action = 'action' . $action_name;

            if (method_exists($controller, $action)) {
                // вызываем действие контроллера
                $controller->init();
                $controller->$action();
            } else {
                Route::ErrorPage404();
            }

        }
    }

    function ErrorPage404()
    {
        $data['msg'] = 'Страница не найдена!';
        $controllerInfo = new ControllerInfo();
        $controllerInfo->setData($data);
        $controllerInfo->actionError();
    }

}
