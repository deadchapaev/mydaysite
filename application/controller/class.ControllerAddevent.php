<?php
	require_once 'application/core/class.Controller.php';
	class ControllerAddevent extends Controller {
		function actionDefault() {
			$this->view->generate( 'ViewAddevent.php', 'ViewMain.php', null);
		}		
	}
?>