<?php
require_once 'application/core/class.Controller.php';
require_once 'application/model/class.ModelEvent.php';
require_once '/application/view/ViewEvent.php';
require_once '/application/view/ViewMain.php';
require_once '/application/controller/class.ControllerEvent.php';
class ControllerMain extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEvent());
    }

    function actionDefault()
    {
        //$controllerEvent = new ControllerEvent();
        //$controllerEvent->setModel(new ModelEvent());
        //$controllerEvent->setData($this->data);
        //$controllerEvent->setUser($this->getUser());
        //$controllerEvent->init();
        //$controllerEvent->actionDefault();
        //$this->getModel()->getAllDayEvents($this->data);
        //$this->getView()->generate(new ViewEvent($this->data), new ViewMain($this->data), $this->data);
        header( 'Location: /Event' ) ;
    }
}

?>