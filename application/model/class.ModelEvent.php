<?php
require_once "/application/model/db/dao/class.EventDao.php";
class ModelEvent extends Model
{
    private $eventDao;

    function __construct()
    {
        $this->eventDao = new EventDao();
    }

    /**
     * Добавляет событие в базу и возвращает результат согласно стандарту
     * @return mixed
     */
    function addEvent()
    {
        $event = $this->getInputEvent();
        $data['err'] = false;
        if ($event->event != null) {
            $rez = $this->eventDao->addEvent($event);
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

    /**
     * Формирует объект входящего события
     * @return Event объект входящего события
     */
    private function getInputEvent()
    {
        $event = new Event();
        $var = $this->getInputVarArray();
        if (isset($var['event'])) {
            $event->event = $var['event'];
        }
        if (isset($var['detail'])) {
            $event->detail = $var['detail'];
        }
        if (isset($var['eventdate'])) {
            $event->eventdate = $var['eventdate'];
        }
        if (isset($var['groupid'])) {
            $event->groupid = $var['groupid'];
        } else {
            $event->groupid = 0;
        }
        return $event;
    }


}


?>