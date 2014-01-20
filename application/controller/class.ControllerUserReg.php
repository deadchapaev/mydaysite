<?php
    require_once 'application/core/class.Controller.php';
    class ControllerUserReg extends Controller {

        function actionDefault() {

            include 'application/model/bl/class.UserReg.php';        

            $this->view->generate( 'ViewAddevent.php', 'ViewMain.php', null);
        }       
    }
?>


