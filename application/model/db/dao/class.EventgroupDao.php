<?php
require_once "application/model/db/connect/class.Db.php";

class EventgroupDao
{

    public function getUserGroups($userId)
    {

        $sql = "SELECT *
					  FROM eventgroup a
					 WHERE a.userid = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $userid, $groupname);

        $result = array();
        while ($stmt->fetch()) {
            $result[$id] = array("userid" => $userid,
                "groupname" => $groupname);
        }

        $stmt->close;

        return $result;

    }

    /**
     * регистрация пользователя
     */
    public function addUserGroup($userId, $groupName)
    {

        $sql = "INSERT INTO eventgroup (userid, groupname)
		        	VALUES (?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('is', $userId, $groupName);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

}

?>