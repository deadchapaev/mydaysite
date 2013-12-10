<?php
	require_once 'application/core/class.Controller.php';
	class ControllerMain extends Controller {
		function actionDefault() {
			$this->view->generate(null, 'ViewMain.php', null);
		}		
	}
?>