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
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->getModel()->register());
    }

    function actionLogin()
    {
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->getModel()->login());
    }

}

?>