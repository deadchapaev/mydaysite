<?php
	require_once 'application/core/class.Controller.php';
	require_once 'application/model/class.ModelMain.php';
	class ControllerMain extends Controller {

		function __construct() {		
			$this->model = new ModelMain();		
			$this->view = new View();
		}

		function actionDefault() {
			$this->view->generate( 'ViewContent.php', 'ViewMain.php', $this->model->getData());
		}		
	}
?>