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
        //$_SESSION['msg'] = 'Вы успешно добавили событие!';
        echo 'hello!';
        //header('Location:/');
        if (isset($var['event'])) {
            $rez = $this->eventDao->addEvent($var['event'], $var['detail']);
            if ($rez > 0) {
                $_SESSION['msg'] = 'Вы успешно добавили событие!';
                header('Location:/Info');
            } else {
                $_SESSION['msg'] = 'Событие не добавлено!';
                header('Location:/Info/Error');
            }

        } else {
            $_SESSION['msg'] = 'Недостаточно данных!';
            header('Location:/Info/Error');
        }


    }


}


?>