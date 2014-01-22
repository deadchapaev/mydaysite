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

        $rezVar['err'] = false;
        $var = $this->getInputVarArray();
        if (isset($var['event'])) {
            $rez = $this->eventDao->addEvent($var['event'], $var['detail']);
            if ($rez > 0) {
                $rezVar['msg'] = 'Вы успешно добавили событие!';
            } else {
                $rezVar['msg'] = 'Событие не добавлено!';
                $rezVar['err'] = true;
            }

        } else {
            $rezVar['msg'] = 'Недостаточно данных!';
            $rezVar['err'] = true;
        }

        return $rezVar;
    }


}


?>