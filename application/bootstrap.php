<?php
require_once 'core\Autoloader.php';
use application\core\Route;

session_start();
Route::start(); // запускаем маршрутизатор
?>