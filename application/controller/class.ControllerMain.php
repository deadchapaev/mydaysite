<?php
require_once 'application/core/class.Controller.php';
require_once 'application/model/class.ModelEvent.php';
require_once '/application/view/ViewEvent.php';
require_once '/application/view/ViewMain.php';
require_once '/application/view/ViewUser.php';
require_once '/application/view/ViewUserAuth.php';
class ControllerMain extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEvent());
    }

    function actionDefault()
    {

        if (null !== $this->getUser()->id) {
            $this->getModel()->getAllDayEvents($this->data);
            $this->getView()->generate(new ViewEvent($this->data), new ViewMain($this->data), $this->data);
        } else {
            $this->getView()->generate(new ViewUserAuth($this->data), new ViewMain($this->data), $this->data);

        }

    }
}

?>