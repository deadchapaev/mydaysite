<?php
require_once 'application/core/class.Controller.php';
require_once '/application/view/ViewMain.php';
class ControllerInfo extends Controller
{
    function actionDefault()
    {
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }

    function actionError()
    {
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }
}

?>
