<?php
require_once "application/model/db/connect/class.Db.php";
require_once "application/model/db/entity/class.User.php";

class UserDao
{

    /**
     * Запрос авторизации.
     * TODO: скорее всего будет возвращать ид сессии
     */
    public function userAuthentication(User $user)
    {

        $sql = "SELECT * FROM user a WHERE a.email = ? AND a.pass = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('ss', $user->email, $user->pass);
        $stmt->execute();
        $stmt->store_result();
        $result = $this->getUserArray($stmt);
        $stmt->close;

        return (count($result) > 0 ? $result[0] : null);
    }

    private function getUserArray($stmt)
    {
        $stmt->bind_result($id, $login, $pass, $name, $sname, $avatar, $regdate, $bdate, $email, $session);
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
            $userObj->session = $session;
        }

        return $result;
    }

    /**
     * регистрация пользователя
     */
    public function registerUser(User $user)
    {

        $sql = "INSERT INTO user(login, pass, email, session) VALUES(?, ?, ?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('ssss', $user->login, $user->passr, $user->email, $user->session);
        $stmt->execute();
        //echo($stmt->error);
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

    /**
     * удаление пользователя
     */
    public function deleteUser($userId)
    {

        $sql = "DELETE FROM user WHERE id = ?";

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
    public function checkPresentUserName(User $user)
    {

        $sql = "SELECT * FROM user a WHERE a.login = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('s', $user->login);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;
        $stmt->close;
        return ($result == 1 ? true : true);

    }

    /**
     * существует ли такой юзер в базе?
     */
    public function checkPresentEmain($uMail)
    {
        $sql = "SELECT * FROM user a WHERE a.email = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('s', $uMail);
        $stmt->execute();
        $stmt->store_result();
        $result = $stmt->num_rows;
        $stmt->close;

        return ($result == 1 ? TRUE : FALSE);

    }


    //преобразовывает результирующий набор строк в массив объектов

    /**
     * Получение пользоватея по его идентификатору
     */
    public function getUser($userId)
    {
        $sql = "SELECT * FROM user a WHERE a.id = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->store_result();

        $result = $this->getUserArray($stmt);
        $stmt->close;
        return $result[0];

    }

    public function getUserBySession(User $user)
    {

        $sql = "SELECT * FROM user a WHERE a.session = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('s', $user->session);
        $stmt->execute();
        $stmt->store_result();

        $result = $this->getUserArray($stmt);
        $stmt->close;

        return (count($result) > 0 ? $result[0] : null);
    }

    public function updateUserSession(User $user)
    {
        $sql = "UPDATE user t SET t.session = ? WHERE t.id = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('si', $user->session, $user->id);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;
        return ($result == 1 ? TRUE : FALSE);
    }


}

?>
