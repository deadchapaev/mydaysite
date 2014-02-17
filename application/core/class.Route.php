<?php
require_once '/application/controller/class.ControllerInfo.php';
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

        // добавляем префиксы
        $model_name = 'class.Model' . $controller_name;
        $controller_name = 'Controller' . $controller_name;
        $action_name = 'action' . $action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = $model_name . '.php';
        $model_path = "application/model/" . $model_file;
        if (file_exists($model_path)) {
            include_once $model_path;
        }

        // подцепляем файл с классом контроллера
        $controller_file = 'class.' . $controller_name . '.php';
        $controller_path = "application/controller/" . $controller_file;
        if (file_exists($controller_path)) {

            include_once $controller_path;

            // создаем контроллер
            $controller = new $controller_name;
            $action = $action_name;
            if (method_exists($controller, $action)) {
                // вызываем действие контроллера
                $controller->init();
                $controller->$action();
            } else {
                Route::ErrorPage404();
            }

        } else {
            Route::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $data['msg'] = 'Страница не найдена!';
        $controllerInfo  = new ControllerInfo();
        $controllerInfo->setData($data);
        $controllerInfo->actionError();
    }

}
