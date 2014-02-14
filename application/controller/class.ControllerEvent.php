<?php
require_once '/application/core/class.Controller.php';
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
        $this->getView()->generate('ViewEvent.php', 'ViewMain.php', $this->data);
    }

    function actionAddWs()
    {
        $this->getModel()->addEvent($this->data);
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->data);
    }

    function actionAdd()
    {
        $this->getModel()->getUserGroups($this->data);
        $this->getView()->generate('ViewEventAdd.php', 'ViewMain.php', $this->data);
    }
}

?>
