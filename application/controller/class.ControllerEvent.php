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
        $this->getView()->generate('ViewEvent.php', 'ViewMain.php', null);
    }

    function actionAdd()
    {
        $this->getModel()->addEvent();
        $this->getView()->generate('ViewEventAdd.php', 'ViewMain.php', null);
    }

    function actionAddGroup()
    {
        $this->getView()->generate('ViewGroupAdd.php', 'ViewMain.php', null);
    }
}

?>
