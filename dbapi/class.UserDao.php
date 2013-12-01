<?php
	require_once "dbapi/class.Db.php";
	
	class UserDao {

    	//проверка наличия пользователя в базе
		public function userAuthentication($login, $password) {

			$sql = "SELECT * 
				      FROM user a
					 WHERE a.login = ?  
					   AND a.pass = password(?)";

			$stmt = Db::getInstance()->getDbConnect()->prepare($sql);
			$stmt->bind_param('ss',$login, $password);
			$stmt->execute();
			$stmt->store_result();
			$result = $stmt->num_rows;		
			$stmt->close;

			return ($result == 1 ? true : false);  
		}

    	//регистрация пользователя
		public function registerUser($login, $password, $email) {

			$sql = "INSERT INTO user (login, pass, email) 
		        	VALUES (?, password(?), ?)";
    	
    		$stmt = Db::getInstance()->getDbConnect()->prepare($sql);
    		$stmt->bind_param('sss', $login, $password, $email);
			$stmt->execute();
			$result = $stmt->affected_rows;
			$stmt->close;

    		return $result;
		}


	}


?>
