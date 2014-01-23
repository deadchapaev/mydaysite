<?php
require_once "/application/model/db/dao/class.EventgroupDao.php";
class ModelEventgroup extends Model
{

    private $eventgroupDao;

    function __construct()
    {
        $this->eventgroupDao = new EventgroupDao();
    }

    function addEventgroup()
    {
        $data['err'] = false;
        $var = $this->getInputVarArray();
        $eventgroup = $this->getInputEventgroup();

        if ($eventgroup->groupname != null && $eventgroup->userid != null) {
            $rez = $this->eventDao->addEventgroup($eventgroup);
            if ($rez > 0) {
                $data['msg'] = 'Вы успешно добавили группу!';
            } else {
                $data['msg'] = 'Группа не добавлена!';
                $data['err'] = true;
            }
        } else {
            $data['msg'] = 'Недостаточно данных!';
            $data['err'] = true;
        }

        return $data;
    }

    /**
     * Возвращает входящую группу событий
     * @return Eventgroup группа событий
     */
    private function getInputEventgroup()
    {
        $eventgroup = new Eventgroup();
        $var = $this->getInputVarArray();
        if (isset($var['groupname'])) {
            $eventgroup->groupname = $var['groupname'];
        }
        if (isset($var['userid'])) {
            $eventgroup->userid = $var['userid'];
        }

        return $eventgroup;
    }


}


?>