<?php
require_once 'application/core/class.Controller.php';
class ControllerInfo extends Controller
{
    function actionDefault()
    {
        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);
    }

    function actionError()
    {
        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);
    }

}

?>
