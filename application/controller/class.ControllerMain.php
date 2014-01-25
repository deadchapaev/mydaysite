<?php
require_once 'application/core/class.Controller.php';
require_once 'application/model/class.ModelEvent.php';
class ControllerMain extends Controller
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
}

?>