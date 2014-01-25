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
        $this->getView()->generate((null !== $this->getUser()->id ? 'ViewUser.php' : 'ViewUserAuth.php'), 'ViewMain.php', $this->data);
    }

    function actionReg()
    {
        //print_r($this->data);
        $this->getModel()->register($this->data);

        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->data);
    }

    function actionLogin()
    {
        $this->getModel()->login($this->data);
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->data);

    }

    function actionLogoutWs()
    {
        $this->getModel()->logout($this->data);
        $this->getView()->generate('ViewInfo.php', 'ViewMain.php', $this->data);
    }
}

?>