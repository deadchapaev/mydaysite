<?php
require_once "/application/model/db/dao/class.EventDao.php";
require_once "/application/model/bl/class.GetPostAnalyzer.php";
class ModelEvent extends Model
{
    private $eventDao;

    function __construct()
    {
        $this->eventDao = new EventDao();
    }

    function addEvent() {

        $var = $this->getInputVarArray();

        /*if (isset($var['email']) && isset($var['pass'])) {
            if ($this->userDao->userAuthentication($var['email'], $var['pass'])) {
                $_SESSION['msg'] = 'Вы успешно вошли в систему!';
                header('Location:/Info');
            } else {
                //если ошибка авторизации то редиректим на страничку ошибки
                $_SESSION['msg'] = 'Ошибка авторизации!';
                header('Location:/Info/Error');
            }

        } else {
            exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }*/
    }


}


?>