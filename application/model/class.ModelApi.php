<?php

namespace application\model;


use application\core\Model;
use application\model\db\dao\EventDao;
use application\model\db\dao\EventgroupDao;
use application\model\db\dao\UserDao;

class ModelApi extends Model
{
    private $eventgroupDao;
    private $eventDao;
    private $userDao;

    function __construct()
    {
        $this->eventgroupDao = new EventgroupDao();
        $this->eventDao = new EventDao();
        $this->userDao = new UserDao();

    }

    /**
     * получение списка групп по ид пользователя
     */
    function getUserGroups()
    {
        return $this->eventgroupDao->getEventgroups($this->getUser()->id);
    }

    function getUserInfo($json)
    {
        return $this->userDao->getUser($json["user"]["id"]);
    }
} 