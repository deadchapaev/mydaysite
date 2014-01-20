<?php

	class Route {

		static function start() {

			// контроллер и действие по умолчанию
			$controller_name = 'Main';
			$action_name = 'Default';
		
			$routes = explode('/', $_SERVER['REQUEST_URI']);

			// получаем имя контроллера
			if ( !empty($routes[1]) ) {	
				$controller_name = $routes[1];
			}
		
			// получаем имя экшена
			if ( !empty($routes[2]) ) {
				$action_name = $routes[2];
			}

			// добавляем префиксы
			$model_name = 'class.Model'.$controller_name;
			$controller_name = 'Controller'.$controller_name;
			$action_name = 'action'.$action_name;
			
			// подцепляем файл с классом модели (файла модели может и не быть)
			$model_file = $model_name.'.php';
			$model_path = "application/models/".$model_file;
			if(file_exists($model_path)) {
				include $model_path;
			}

			// подцепляем файл с классом контроллера
			$controller_file = 'class.'.$controller_name.'.php';
			$controller_path = "application/controller/".$controller_file;			
			if(file_exists($controller_path)) {	

				
				include $controller_path;
								
				// создаем контроллер
				$controller = new $controller_name;
				$action = $action_name;
				
				if(method_exists($controller, $action)) {
					// вызываем действие контроллера
					
					$controller->$action();
				} else {
					//Route::ErrorPage404();
				}				
				
			} else {
				//Route::ErrorPage404();
			}	
		}

		function ErrorPage404()	{
        	$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        	header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:'.$host.'404');
    	}
    
}
