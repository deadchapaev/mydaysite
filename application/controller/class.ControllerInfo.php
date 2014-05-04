<?php
namespace application\controller;
use application\core\Controller;
use application\view\ViewInfo;
use application\view\ViewMain;

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
