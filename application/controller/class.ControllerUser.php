<?php
require_once 'application/core/class.Controller.php';
require_once '/application/model/bl/class.UserBl.php';
class ControllerUser extends Controller
{
    function actionDefault()
    {
        $this->view->generate('ViewUserAuth.php', 'ViewMain.php', null);
    }

    function actionReg()
    {
        $userBl = new UserBl();
        $userBl->register();
        $this->view->generate('ViewContent.php', 'ViewMain.php', null);
    }

    function actionLogin()
    {
        $userBl = new UserBl();
        $userBl->login();
        $this->view->generate('ViewEvent.php', 'ViewMain.php', null);
    }

}

?>