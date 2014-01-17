<?php
	require_once 'application/core/class.Model.php';
	require_once 'application/model/db/dao/class.EventDao.php';
	class ModelMain extends Model {

		public function getData() {
			$eventDao = new EventDao();
			$event = $eventDao->getEvents(0, '2013-11-17');
			return $event;
		}

	}

?>