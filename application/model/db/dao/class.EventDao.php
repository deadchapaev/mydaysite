<?php
require_once "application/model/db/connect/class.Db.php";
require_once "application/model/db/entity/class.Event.php";

class EventDao
{

    public function getAllDayEvents($userid, $date)
    {
        $sql = "SELECT e.*
                  FROM  event AS e ,
		                eventgroup AS g
                  WHERE e.groupid = g.id
                    and g.userid = ?
                    and date(e.eventdate) = date(?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('ss', $userid, $date->format('Y-m-d'));
        $stmt->execute();
        $result = $this->getEventArray($stmt->get_result());
        $stmt->close;
        return $result;

    }

    private function getEventArray($res)
    {

        $result = array();
        for ($rowNum = 0; $rowNum < $res->num_rows; $rowNum++) {
            $res->data_seek($rowNum);
            $result[$rowNum] = $this->getEvent($res->fetch_assoc());
        }
        return $result;
    }

    private function getEvent($row)
    {

        $event = new Event();
        $event->id = $row['id'];
        $event->groupid = $row['groupid'];
        $event->event = $row['event'];
        $event->detail = $row['detail'];
        $event->createdate = $row['createdate'];
        $event->eventdate = $row['eventdate'];

        return $event;
    }


    //преобразовывает результирующий набор строк в массив объектов

    public function getEvents($groupId, $date)
    {

        $sql = "SELECT *
                  FROM event a
				 WHERE date(a . eventdate) = date(?)
				   AND a . groupid = ?";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('ss', $date, $groupId);
        $stmt->execute();
        $result = $this->getEventArray($stmt->get_result());
        $stmt->close;
        return $result;
    }

    //преобразовывает строку в объект

    public function addEvent(Event $event)
    {

        $sql = "INSERT INTO event(groupid, event, detail)
                VALUES(?, ?, ?)";

        $stmt = Db::getInstance()->getDbConnect()->prepare($sql);
        $stmt->bind_param('iss', $event->groupid, $event->event, $event->detail);
        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close;
        return $result;
    }
}

?>