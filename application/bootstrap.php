<?php
	// подключаем файлы ядра
	require_once 'core/class.Model.php';
	require_once 'core/class.View.php';
	require_once 'core/class.Controller.php';
	require_once 'core/class.Route.php';
	session_start();
	Route::start(); // запускаем маршрутизатор
?>