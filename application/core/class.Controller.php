<?php
require_once 'application/core/class.Model.php';
class Controller
{

    protected $data;
    private $model;
    private $view;
    private $inputVarArray;
    private $user;

    function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        if ($this->getModel() != null) {
            $this->getModel()->setUser($user);
            $this->data['user'] = $user;

        }
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return \View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param \View $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getInputVarArray()
    {
        return $this->inputVarArray;
    }

    /**
     * @param mixed $inputVarArray
     */
    public function setInputVarArray($inputVarArray)
    {
        $this->inputVarArray = $inputVarArray;
        if ($this->getModel() != null) {
            $this->getModel()->setInputVarArray($inputVarArray);
        }
    }

    /**
     * Будет вызываться по умолчанию
     */


    function actionDefault()
    {
    }
}
