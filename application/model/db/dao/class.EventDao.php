<?php
	require_once "application/model/db/connect/class.Db.php";
	require_once "application/model/db/entity/class.Event.php";
	
	class EventDao {
		
		public function getEvents($groupId, $date) {

			$sql = "SELECT * 
					  FROM event a
					 WHERE date(a.eventdate) = date(?)
				   	AND a.groupid = ?";	
		
			$stmt = Db::getInstance()->getDbConnect()->prepare($sql);
			$stmt->bind_param('ss', $date, $groupId);
			$stmt->execute();
			$result = $this->getEventArray($stmt->get_result());
			$stmt->close;
			return $result;
		}

		//преобразовывает результирующий набор строк в массив объектов
		private function getEventArray($res){

			$result = array();
			for ($rowNum = 0; $rowNum < $res->num_rows; $rowNum++) {
 		    	$res->data_seek($rowNum);
				$result[$rowNum] = $this->getEvent($res->fetch_assoc());
			}
			return $result;
		}

		//преобразовывает строку в объект
		private function getEvent($row) {

			$event = new Event();
			$event->id = $row['id'];
			$event->groupid = $row['groupid'];
			$event->event = $row['event'];
			$event->detail = $row['detail'];
			$event->createdate = $row['createdate'];
			$event->eventdate = $row['eventdate'];
			$event->eventimage = $row['eventimage'];	

			return $event;
		}
	}
?>