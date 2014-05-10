<?php
namespace application\model;

use application\model\db\dao\EventgroupDao;
use application\core\Model;
use application\model\db\entity\Eventgroup;

class ModelEventgroup extends Model
{
    private $eventgroupDao;

    function __construct()
    {
        $this->eventgroupDao = new EventgroupDao();
    }

    function addEventgroup(&$data)
    {
        $data['err'] = false;
        $eventgroup = $this->getInputEventgroup();
        if ($eventgroup->groupname !== null && $eventgroup->userid !== null) {
            $rez = $this->eventgroupDao->addEventgroup($eventgroup);
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

        if (isset($var['detail'])) {
            $eventgroup->detail = $var['detail'];
        }

        $eventgroup->userid = $this->getUser()->id;

        return $eventgroup;
    }


}


?>