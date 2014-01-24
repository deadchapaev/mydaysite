<?php
// подключаем файлы ядра
session_start();
require_once 'core/class.Model.php';
require_once 'core/class.View.php';
require_once 'core/class.Controller.php';
require_once 'core/class.Route.php';
Route::start(); // запускаем маршрутизатор
?>