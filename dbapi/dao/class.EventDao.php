<?php
	require_once "dbapi/class.Db.php";
	require_once "dbapi/class.Event.php";
	
	class EventDao {
		
		public function getEvents($groupId, $date) {

			$sql = "SELECT * 
					  FROM event a
					 WHERE date(a.eventdate) = date(?)
				   	AND a.groupid = ?";	
		
			$stmt = Db::getInstance()->getDbConnect()->prepare($sql);
			$stmt->bind_param('ss', $date, $groupId);
			$stmt->execute();
			$stmt->store_result();

			$result = $this->getEventArray($stmt);
			$stmt->close;
			return $result;
		}

		//преобразовывает результирующий набор строк в массив объектов
		private function getEventArray($stmt){
			$stmt->bind_result($id, $groupid, $event, $detail, $createdate, $eventdate, $eventimage);
			$result = array();
			$i = 0;
			while ($stmt->fetch()) {
    			$eventObj = new Event();
    			$result[$i++] = $eventObj;
				
				$eventObj->id = $id;
				$eventObj->groupid = $groupid;
				$eventObj->event = $event;
				$eventObj->detail = $detail;
				$eventObj->createdate = $createdate;
				$eventObj->eventdate = $eventdate;
				$eventObj->eventimage = $eventimage;		
			}

			return $result;
		}

	}
?>