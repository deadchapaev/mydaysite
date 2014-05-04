<?php
namespace application\controller;
use application\core\Controller;
use application\model\ModelEvent;
use application\view\ViewEvent;
use application\view\ViewEventAdd;
use application\view\ViewInfo;
use application\view\ViewMain;

class ControllerEvent extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEvent());
    }

    function actionDefault()
    {
        $this->checkAuth();
        $this->getModel()->getAllDayEvents($this->data);
        $this->getView()->generate(new ViewEvent($this->data), new ViewMain($this->data), $this->data);
    }

    function actionAddWs()
    {
        $this->checkAuth();
        $this->getModel()->addEvent($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }

    function actionAdd()
    {
        $this->checkAuth();
        $this->getModel()->getUserGroups($this->data);
        $this->getView()->generate(new ViewEventAdd($this->data), new ViewMain($this->data), $this->data);
    }
}

?>
