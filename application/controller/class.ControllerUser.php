<?php
require_once 'application/core/class.Controller.php';
class ControllerUser extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelUser());

    }

    function actionDefault()
    {
        $this->getView()->generate('ViewUserAuth.php', 'ViewMain.php', null);
    }

    function actionReg()
    {
        $this->getModel()->register();
        $this->getView()->generate('ViewContent.php', 'ViewMain.php', null);
    }

    function actionLogin()
    {
        $this->getModel()->login();
        $this->getView()->generate('ViewEvent.php', 'ViewMain.php', null);
    }

}

?>