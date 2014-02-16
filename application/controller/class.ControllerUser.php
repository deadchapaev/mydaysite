<?php
require_once '/application/core/class.Controller.php';
require_once '/application/view/ViewUser.php';
require_once '/application/view/ViewUserAuth.php';
require_once '/application/view/ViewInfo.php';

class ControllerUser extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelUser());
    }

    function actionDefault()
    {
        $this->getView()->generate((null !== $this->getUser()->id ? new ViewUser() : new ViewUserAuth()), 'ViewMain.php', $this->data);
    }

    function actionReg()
    {
        //print_r($this->data);
        $this->getModel()->register($this->data);

        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);
    }

    function actionLogin()
    {
        $this->getModel()->login($this->data);
        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);

    }

    function actionLogoutWs()
    {
        $this->getModel()->logout($this->data);
        $this->getView()->generate(new ViewInfo($this->data), 'ViewMain.php', $this->data);
    }
}

?>