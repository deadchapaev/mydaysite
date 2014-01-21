<?php
require_once "application/model/db/connect/class.Db.php";
require_once "application/model/db/entity/class.User.php";


class UserDao
{

    /**
     * Запрос авторизации.
     * TODO: скорее всего будет возвращать ид сессии
     */
    public function userAuthentication($email, $password)
    {

        $sql = "SELECT *
				      FROM user a
					 WHERE a.email = ?
		               AND a.pass = ?";
        //AND a.pass = password(?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;
        $stmt->close;

        return ($result == 1 ? TRUE : FALSE);
    }


    /**
     * регистрация пользователя
     */
    public function registerUser($login, $password, $email)
    {

        $sql = "INSERT INTO user(login, pass, email)
		        	VALUES(?, ?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('sss', $login, $password, $email);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

    /**
     * удаление пользователя
     */
    public function deleteUser($userId)
    {

        $sql = "DELETE FROM user
			          WHERE id = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

    /**
     * существует ли такой юзер в базе?
     */
    public function checkPresentUserName($login)
    {

        $sql = "SELECT *
    FROM user a
					 WHERE a . login = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;
        $stmt->close;
        return ($result == 1 ? TRUE : FALSE);

    }

    /**
     * существует ли такой юзер в базе?
     */
    public function checkPresentEmain($uMail)
    {
        $sql = "SELECT *
    FROM user a
					 WHERE a . email = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('s', $uMail);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;
        $stmt->close;

        return ($result == 1 ? TRUE : FALSE);

    }

    /**
     * Получение пользоватея по его идентификатору
     */
    public function getUser($userId)
    {
        $sql = "SELECT *
    FROM user a
					 WHERE a . id = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->store_result();

        $result = $this->getUserArray($stmt);
        $stmt->close;
        return $result[0];

    }


    //преобразовывает результирующий набор строк в массив объектов
    private function getUserArray($stmt)
    {
        $stmt->bind_result($id, $login, $pass, $name, $sname, $avatar, $regdate, $bdate, $email);
        $result = array();
        $i = 0;
        while ($stmt->fetch()) {
            $userObj = new User();
            $result[$i++] = $userObj;

            $userObj->id = $id;
            $userObj->login = $login;
            $userObj->pass = $pass;
            $userObj->name = $name;
            $userObj->sname = $sname;
            $userObj->avatar = $avatar;
            $userObj->regdate = $regdate;
            $userObj->bdate = $bdate;
            $userObj->email = $email;
        }

        return $result;
    }


}


?>
