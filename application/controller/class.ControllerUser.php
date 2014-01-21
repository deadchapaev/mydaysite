<?php
require_once 'application/core/class.Controller.php';
class ControllerUser extends Controller
{
    function actionDefault()
    {
        $this->view->generate('ViewUserAuth.php', 'ViewMain.php', null);
    }

    function actionReg()
    {
        include 'application/model/bl/class.UserReg.php';
        $this->view->generate('ViewContent.php', 'ViewMain.php', null);
    }

    function actionLogin()
    {
        include 'application/model/bl/class.UserLogin.php';
        $this->view->generate('ViewContent.php', 'ViewMain.php', null);
    }

}

?>