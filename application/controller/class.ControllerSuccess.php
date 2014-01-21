<?php
	require_once 'application/core/class.Controller.php';
	class ControllerSuccess extends Controller {	
		function actionDefault() {		
			$this->view->generate('ViewSuccess.php', 'ViewMain.php', null);
		}
	}
?>
