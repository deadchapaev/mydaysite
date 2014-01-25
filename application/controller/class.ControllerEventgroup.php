<?php
require_once '/application/core/class.Controller.php';
class ControllerEventgroup extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEventgroup());
    }

    function actionDefault()
    {
        $this->getView()->generate('ViewGroupAdd.php', 'ViewMain.php', $this->data);
    }

    function actionAddWs()
    {
        $this->getModel()->addEventgroup($this->data);
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->data);
    }
}

?>
