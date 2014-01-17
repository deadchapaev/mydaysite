<?php
	require_once 'application/core/class.Controller.php';
	class ControllerMain extends Controller {
		function actionDefault() {
			$this->view->generate( 'ViewContent.php', 'ViewMain.php', null);
		}		
	}
?>