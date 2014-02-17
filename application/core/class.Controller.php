<?php
require_once 'application/core/class.Model.php';
require_once '/application/model/bl/class.GetPostAnalyzer.php';
require_once '/application/model/class.ModelUser.php';
require_once '/application/view/ViewInfo.php';

class Controller
{

    protected $data;
    private $model;
    private $view;
    private $inputVarArray;
    private $user;
    private $modelUser;
    private $getPostAnalyzer;
    private $authorized;

    function __construct()
    {
        $this->view = new View();
        $this->modelUser = new ModelUser();
        $this->getPostAnalyzer = new GetPostAnalyzer();
    }

    public function isAuthorized()
    {
        return $this->authorized;
    }

    public function init()
    {
        $this->setInputVarArray($this->getPostAnalyzer->getVarArray());
        $this->authorization();
    }

    function authorization()
    {
        $this->modelUser->findUser($this->data);
        $this->setUser($this->data['user']);
        if (null !== $this->getUser()->id) {
            $this->authorized = true;
        } else {
            $this->authorized = false;
        }
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

    public function getInputVarArray()
    {
        return $this->inputVarArray;
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

    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Будет вызываться по умолчанию
     */
    function actionDefault()
    {
    }

    function checkAuth()
    {
        if (!$this->authorized) {
            $this->notAuthorized();
        }
    }

    function notAuthorized()
    {
        $this->data['msg'] = 'Не авторизирован!';
        $this->getView()->generate(new ViewInfo($this->data), new ViewMain($this->data), $this->data);
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
