<?php
	require_once 'application/core/class.Model.php';
	require_once 'application/model/db/dao/class.EventDao.php';
	class UserReg extends Model {

		public function getData() {
			include 'bl/UserReg.php';
			return "";
		}

	}

?>