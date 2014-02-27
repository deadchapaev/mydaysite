<?php
require_once '/application/core/class.Controller.php';
require_once '/application/view/ViewEvent.php';
require_once '/application/view/ViewEventAdd.php';
require_once '/application/view/ViewMain.php';
require_once '/application/view/ViewInfo.php';
class ControllerEvent extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEvent());
    }

    function actionDefault()
    {
        //если данное действие требует авторизации - чекнем её
        $this->checkAuth();
        $this->getModel()->getAllDayEvents($this->data);
        $this->getView()->generate(new ViewEvent($this->data), new ViewMain($this->data), $this->data);
    }

    function actionAddWs()
    {
        $this->getModel()->addEvent($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
    }

    function actionAdd()
    {
        $this->getModel()->getUserGroups($this->data);
        $this->getView()->generate(new ViewEventAdd($this->data), new ViewMain($this->data), $this->data);
    }
}

?>
