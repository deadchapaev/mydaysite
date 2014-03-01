<?php
require_once 'application/core/class.Controller.php';
require_once '/application/view/ViewMain.php';
class ControllerMain extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function actionDefault()
    {
        if (null !== $this->getUser()->id) {
            header('Location: /Event');
        } else {
            header('Location: /User');
        }
    }
}

?>