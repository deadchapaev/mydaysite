<?php
	
	function getDbConnectObj() {

		$mysqli = new mysqli('localhost','root','','mmd');

		if ($mysqli->connect_error) {
    		die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
		}

		if (mysqli_connect_error()) {
    		die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
		}

		return $mysqli;
	}


	function executeQuery($sql) {	

		$mysqli = getDbConnectObj();	
		
		if ($stmt = $mysqli->prepare($sql)) {
			/* execute query */
    		$stmt->execute();
    		/* store result */
    		$stmt->store_result();
    				
		}
		/* close connection */
		$mysqli->close();

		return $stmt;

	}	

	//регистрация пользователя
	function registerUser($login, $password, $email) {

		$sql = "INSERT INTO user (login, pass, email) 
		        VALUES ('" . $login . "', password('" . $password . "'),'" .$email . "')";
    	
    	$stmt = executeQuery($sql);
		$result = $stmt->affected_rows;
		$stmt->close;

    	return $result;
	}

	//проверка наличия пользователя в базе
	function userAuthentication($login, $password) {

		$sql = "SELECT * 
				  FROM user a
				 WHERE a.login = '".$login. "'
				   AND a.pass = password('". $password ."')";
		
		$stmt = executeQuery($sql);
		$result = $stmt->num_rows;		
		$stmt->close;

		return ($result == 1 ? true : false);  
	}

	function getUserGroups($userId) {

		$sql = "SELECT * 
				  FROM eventgroup a
				 WHERE a.userid = ".$userId;	

		$stmt = executeQuery($sql);
		$stmt->bind_result($id, $userid, $groupname);

    	$result = array();		
    	while ($stmt->fetch()) {
    		$result[$id] = array("userid"    => $userid, 
    							 "groupname" => $groupname);
    	}
			
		$stmt->close;

		return $result;

	}



	function getEvents($groupId, $date) {

		$sql = "SELECT * 
				  FROM event a
				 WHERE date(a.eventdate) = date('". $date ."')
				   AND a.groupid = ".$groupId;	
		
		$stmt = executeQuery($sql);
		$stmt->bind_result($id, $groupid, $event, $detail, $createdate, $eventdate, $eventimage);


    	$result = array();		
    	while ($stmt->fetch()) {
    		$result[$id] = array("groupid"    => $groupid, 
    							 "event"      => $event,
    							 "detail"     => $detail,
    							 "createdate" => $createdate,
    							 "eventdate"  => $eventdate,
    							 "eventimage" => $eventimage);
    	}
			
		$stmt->close;

		return $result;
	}

?>