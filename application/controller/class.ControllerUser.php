<?php
require_once '/application/core/class.Controller.php';
require_once '/application/view/ViewUser.php';
require_once '/application/view/ViewUserAuth.php';
require_once '/application/view/ViewMain.php';

class ControllerUser extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelUser());
    }

    function actionDefault()
    {
        $this->getView()->generate((null !== $this->getUser()->id ? new ViewUser($this->data) : new ViewUserAuth($this->data)), new ViewMain($this->data), $this->data);
    }

    function actionReg()
    {
        $this->getModel()->register($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }

    function actionLogin()
    {
        $this->getModel()->login($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);

    }

    function actionLogoutWs()
    {
        $this->checkAuth();
        $this->getModel()->logout($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }
}

?>