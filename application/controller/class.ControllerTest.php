<?php
	require_once 'application/core/class.Controller.php';
	require_once 'application/model/class.ModelTest.php';
	class ControllerTest extends Controller {

		function __construct() {
			parent::__construct();
			$this->model = new ModelTest();
		}

		
		function actionDefault() {
			
			$this->view->generate(null, 'ViewTest.php', $this->model->getData());
		}

	}

?>