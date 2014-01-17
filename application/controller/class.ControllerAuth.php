<?php
	require_once 'application/core/class.Controller.php';
	class ControllerAuth extends Controller {
		function actionDefault() {
			$this->view->generate('ViewAuth.php', 'ViewMain.php', null);
		}		
	}
?>