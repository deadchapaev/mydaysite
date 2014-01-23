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
        $this->getView()->generate('ViewGroupAdd.php', 'ViewMain.php', null);
    }

    function actionAddWs()
    {
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->getModel()->addEventgroup());
    }
}

?>
