<?php
	require_once "dbapi/class.Db.php";

	class EventgroupDao {

		public function getUserGroups($userId) {

			$sql = "SELECT * 
					  FROM eventgroup a
					 WHERE a.userid = ?";	

			$stmt = Db::getInstance()->getDbConnect()->prepare($sql);
			$stmt->bind_param('i',$userId);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($id, $userid, $groupname);

    		$result = array();		
    		while ($stmt->fetch()) {
    			$result[$id] = array("userid"    => $userid, 
    							 "groupname" => $groupname);
    		}
			
			$stmt->close;

			return $result;

		}
	}

?>