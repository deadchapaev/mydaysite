<?php
require_once "application/model/db/connect/class.Db.php";
require_once "application/model/db/entity/class.Eventgroup.php";

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
     * @param Eventgroup $eventgroup
     * @return int
     */
    public function addEventgroup(Eventgroup $eventgroup)
    {

        $sql = "INSERT INTO eventgroup (userid, groupname)
		        	VALUES (?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('is', $eventgroup->userid, $eventgroup->groupname);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

}

?>