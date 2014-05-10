<?php
namespace application\controller;
use application\core\Controller;
use application\view\ViewGroupAdd;
use application\view\template\ViewTemplateMain;

class ControllerEventgroup extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelEventgroup());
    }

    function actionDefault()
    {
        $this->checkAuth();
        $this->getView()->generate(new ViewGroupAdd($this->data), new ViewTemplateMain($this->data), $this->data);
    }

    function actionAddWs()
    {
        $this->checkAuth();
        $this->getModel()->addEventgroup($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewTemplateMain($this->data), $this->data);
    }
}

?>
