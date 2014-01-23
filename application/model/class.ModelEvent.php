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

    function addEvent()
    {
        $data['err'] = false;
        $var = $this->getInputVarArray();
        if (isset($var['event'])) {
            $rez = $this->eventDao->addEvent($var['event'], $var['detail']);
            if ($rez > 0) {
                $data['msg'] = 'Вы успешно добавили событие!';
            } else {
                $data['msg'] = 'Событие не добавлено!';
                $data['err'] = true;
            }

        } else {
            $data['msg'] = 'Недостаточно данных!';
            $data['err'] = true;
        }

        return $data;
    }


}


?>