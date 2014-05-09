<?php
namespace application\core;

use application\model\bl\GetPostAnalyzer;
use application\model\ModelUser;
use application\view\ViewInfo;
use application\view\ViewTemplateMain;

class Controller
{

    protected $data;
    private $model;
    private $view;
    private $inputVarArray;
    private $user;
    private $modelUser;
    private $getPostAnalyzer;

    function __construct()
    {
        $this->view = new View();
        $this->modelUser = new ModelUser();
        $this->getPostAnalyzer = new GetPostAnalyzer();
    }

    //-----------------------------Служебные методы------------//
    public function init()
    {
        $this->setInputVarArray($this->getPostAnalyzer->getVarArray());
        $this->authorization();
    }

    protected function authorization()
    {
        $this->modelUser->findUser($this->data);
        $this->setUser($this->data['user']);
    }

    protected function checkAuth()
    {
        if (!$this->isAuthorized()) {
            $this->notAuthorized();
        }
    }

    protected function notAuthorized()
    {
        $this->data['msg'] = 'Не авторизирован!';
        $this->getView()->generate(new ViewInfo($this->data), new ViewTemplateMain($this->data), $this->data);
        die();
    }

    public function isAuthorized()
    {
        if (null !== $this->getUser() && null !== $this->getUser()->id) {
            return true;
        }
        return false;
    }

    //-----------------------------Экшны-----------------------//
    /**
     * Будет вызываться по умолчанию
     */
    function actionDefault()
    {
    }

    //-----------------------------Сеттеры-геттеры-------------//
    public function getInputVarArray()
    {
        return $this->inputVarArray;
    }

    /**
     * @return \application\model\bl\GetPostAnalyzer
     */
    protected function getGetPostAnalyzer()
    {
        return $this->getPostAnalyzer;
    }


    public function setInputVarArray($inputVarArray)
    {
        $this->inputVarArray = $inputVarArray;
        $this->modelUser->setInputVarArray($this->inputVarArray);
        if ($this->getModel() != null) {
            $this->getModel()->setInputVarArray($inputVarArray);
        }
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        $this->data['user'] = $user;
        if ($this->getModel() != null) {
            $this->getModel()->setUser($user);
        }
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function setData($data)
    {
        $this->data = $data;
    }


}
