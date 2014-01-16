<?php
	require_once 'application/core/class.Controller.php';
	class ControllerAuth extends Controller {
		function actionDefault() {
			$this->view->generate(null, 'ViewAuth.php', null);
		}		
	}
?>