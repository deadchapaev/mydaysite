<?php
require_once '/application/core/class.Controller.php';
require_once '/application/view/ViewEvent.php';
require_once '/application/view/ViewEventAdd.php';

class ControllerEvent extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEvent());
    }

    function actionDefault()
    {
        $this->getModel()->getAllDayEvents($this->data);
        $this->getView()->generate(new ViewEvent($this->data), 'ViewMain.php', $this->data);
    }

    function actionAddWs()
    {
        $this->getModel()->addEvent($this->data);
        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);
    }

    function actionAdd()
    {
        $this->getModel()->getUserGroups($this->data);
        $this->getView()->generate(new ViewEventAdd($this->data), 'ViewMain.php', $this->data);
    }
}

?>
