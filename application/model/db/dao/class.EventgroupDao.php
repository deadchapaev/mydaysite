<?php
require_once "application/model/db/connect/class.Db.php";
require_once "application/model/db/entity/class.Eventgroup.php";

class EventgroupDao
{

    public function getEventgroups($userId)
    {

        $sql = "SELECT *
					  FROM eventgroup a
					 WHERE a.userid = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $this->getEventgroupArray($stmt->get_result());
        $stmt->close;

        return $result;

    }

    private function getEventgroupArray($res)
    {

        $result = array();
        for ($rowNum = 0; $rowNum < $res->num_rows; $rowNum++) {
            $res->data_seek($rowNum);
            $result[$rowNum] = $this->getEventgroup($res->fetch_assoc());
        }
        return $result;
    }

    //преобразовывает результирующий набор строк в массив объектов

    private function getEventgroup($row)
    {
        $eventgroup = new Eventgroup();
        $eventgroup->id = $row['id'];
        $eventgroup->groupname = $row['groupname'];
        $eventgroup->detail = $row['detail'];
        $eventgroup->userid = $row['userid'];

        return $eventgroup;
    }

    //преобразовывает строку в объект

    /**
     * @param Eventgroup $eventgroup
     * @return int
     */
    public function addEventgroup(Eventgroup $eventgroup)
    {

        $sql = "INSERT INTO eventgroup (userid, groupname, detail)
		        	VALUES (?, ?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('iss', $eventgroup->userid, $eventgroup->groupname, $eventgroup->detail);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;

        return $result;
    }

    public function getAllDayEventgroups($userid, $date)
    {
        $sql = "SELECT g.*
                  FROM eventgroup AS g
                 WHERE g.userid = ?
                   and exists (SELECT *
                                 FROM event AS e
                                WHERE e.groupid = g.id
                                  and date(e.eventdate) = date(?))
                 ORDER BY g.groupname";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('is', $userid, $date->format('Y-m-d'));
        $stmt->execute();
        $result = $this->getEventgroupArray($stmt->get_result());
        $stmt->close;

        return $result;

    }


}

?>