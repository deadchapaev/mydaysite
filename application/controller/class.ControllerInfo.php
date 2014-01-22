<?php
require_once 'application/core/class.Controller.php';
class ControllerInfo extends Controller
{
    function actionDefault()
    {
        //print_r($_COOKIE);
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', null);
    }

    function actionError()
    {
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', null);
    }

}

?>
