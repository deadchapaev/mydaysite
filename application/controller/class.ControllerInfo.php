<?php
require_once 'application/core/class.Controller.php';
class ControllerInfo extends Controller
{
    function actionDefault()
    {
        $this->view->generate('ViewInfo.php', 'ViewMain.php', null);
    }

    function actionError()
    {
        $this->view->generate('ViewInfo.php', 'ViewMain.php', null);
    }
}

?>
