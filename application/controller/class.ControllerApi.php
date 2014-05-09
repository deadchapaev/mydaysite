<?php
namespace application\controller;

use application\core\Controller;
use application\model\bl\JsonUtils;
use application\model\ModelApi;
use application\view\ViewApiJson;
use application\view\ViewTemplateApiJson;


class ControllerApi extends Controller
{

    private $json;

    function __construct()
    {
        parent::__construct();
        $this->setModel(new ModelApi());
    }

    public function init()
    {
        parent::init();
        $this->json = $this->getGetPostAnalyzer()->getInputJson();
    }


    function actionDefault()
    {
        $this->checkAuth();
        $this->data['json'] = JsonUtils::varToJson($this->getModel()->getUserGroups());
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }

    function actionGetUserGroups()
    {
        $this->checkAuth();
        $this->data['json'] = JsonUtils::varToJson($this->getModel()->getUserGroups());
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }

    function actionGetUserInfo()
    {
        $this->checkAuth();
        $this->data['json'] = JsonUtils::varToJson($this->getModel()->getUserInfo($this->json));
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }


    function actionTest()
    {
        $this->data['json'] = "This is test!";
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }

    function actionTestAuth()
    {
        $this->checkAuth();
        $this->data['json'] = "This method is secured!";
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }

    function actionTestNotAuth()
    {
        $this->data['json'] = "This method is free!";
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
    }


    //-------------------------------------
    protected function notAuthorized()
    {
        $this->data['json'] = 'Not authorized!';
        $this->getView()->generate(new ViewApiJson($this->data), new ViewTemplateApiJson());
        die();
    }

}