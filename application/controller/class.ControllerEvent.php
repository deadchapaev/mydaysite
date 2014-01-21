<?php
require_once 'application/core/class.Controller.php';
class ControllerEvent extends Controller
{
    function actionDefault()
    {
        $this->view->generate('ViewEvent.php', 'ViewMain.php', null);
    }

    function actionAdd()
    {
        $this->view->generate('ViewEventAdd.php', 'ViewMain.php', null);
    }

    function actionAddGroup()
    {
        $this->view->generate('ViewGroupAdd.php', 'ViewMain.php', null);
    }
}

?>
