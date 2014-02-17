<?php
require_once '/application/core/class.Controller.php';
require_once '/application/view/ViewGroupAdd.php';
require_once '/application/view/ViewMain.php';
class ControllerEventgroup extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEventgroup());
    }

    function actionDefault()
    {
        $this->getView()->generate(new ViewGroupAdd($this->data), new ViewMain($this->data), $this->data);
    }

    function actionAddWs()
    {
        $this->getModel()->addEventgroup($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }
}

?>
