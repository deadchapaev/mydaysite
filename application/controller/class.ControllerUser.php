<?php
namespace application\controller;

use application\core\Controller;
use application\model\ModelUser;
use application\view\ViewInfo;
use application\view\ViewTemplateMain;
use application\view\ViewUser;
use application\view\ViewUserAuth;

class ControllerUser extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelUser());
    }

    function actionDefault()
    {
        $this->getView()->generate((null !== $this->getUser()->id ? new ViewUser($this->data) : new ViewUserAuth($this->data)), new ViewTemplateMain($this->data), $this->data);
    }

    function actionReg()
    {
        $this->getModel()->register($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewTemplateMain($this->data), $this->data);
    }

    function actionLogin()
    {
        $this->getModel()->login($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewTemplateMain($this->data), $this->data);

    }

    function actionLogoutWs()
    {
        $this->checkAuth();
        $this->getModel()->logout($this->data);
        $this->getView()->generate(new ViewInfo($this->data), new ViewTemplateMain($this->data), $this->data);
    }
}

?>