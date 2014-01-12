<?php
	require_once 'application/core/class.Controller.php';
	class Controller404 extends Controller {	
		function actionDefault() {		
			$this->view->generate(null, 'View404.php', null);
		}
	}
?>
