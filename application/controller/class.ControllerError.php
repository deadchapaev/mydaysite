<?php
	require_once 'application/core/class.Controller.php';
	class ControllerError extends Controller {	
		function actionDefault() {		
			$this->view->generate('ViewError.php', 'ViewMain.php', null);
		}
	}
?>
