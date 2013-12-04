<?php
	require_once 'application/core/class.Controller.php';
	class ControllerTest extends Controller {
		
		function actionDefault() {

			$this->view->generate('contacts_view.php', 'ViewMain.php');
		}

	}

?>