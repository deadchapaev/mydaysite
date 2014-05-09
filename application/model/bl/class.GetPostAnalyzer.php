<?php
namespace application\model\bl;

/**
 * Created by PhpStorm.
 * User: chapaev
 * Date: 21.01.14
 * Time: 20:28
 */
use DateTime;

class GetPostAnalyzer
{
    private $var;

    public function getVarArray()
    {
        $this->getMail($_POST);
        $this->getLogin($_POST);
        $this->getDetail($_POST);
        $this->getGroupname($_POST);
        $this->getEvent($_POST);
        $this->getGroupid($_POST);
        $this->getSdate($_GET);
        $this->getSessionId();
        $this->getAuthPass($_POST);
        $this->getRegPass($_POST);
        $this->unsetInputData();
        return $this->var;
    }


    //-----------------------Методы анализа входящих параметров----------------------------------
    /**
     * Возвращает мэйл
     * @param $var
     */
    private function getMail($var)
    {
        $email = $var['emailin'];
        if (!empty($email)) {
            $this->var['email'] = $email;
        } else {
            $email = $var['emailr'];
            if (!empty($email)) {
                $this->var['email'] = $email;
            }
        }
    }

    /**
     * Возвращает логин
     * @param $var
     */
    private function getLogin($var)
    {
        $login = $var['loginr'];
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $login = trim($login);
        if (!empty($login)) {
            $this->var['login'] = $login;
        }
    }

    /**
     * Возвращает описание события/группы
     * @param $var
     */
    private function getDetail($var)
    {
        $detail = $var['detail'];
        if (!empty($detail)) {
            $this->var['detail'] = $detail;
        }
    }

    /**
     * Возвращает имя группы
     * @param $var
     */
    private function getGroupname($var)
    {
        $groupname = $var['groupname'];
        if (!empty($groupname)) {
            $this->var['groupname'] = $groupname;
        }
    }

    /**
     * Возвращает событие
     * @param $var
     */
    private function getEvent($var)
    {
        $event = $var['event'];
        if (!empty($event)) {
            $this->var['event'] = $event;
        }
    }

    /**
     * Возвращает ид группы событий
     * @param $var
     */
    private function getGroupid($var)
    {
        $groupid = $var['groupid'];
        if (!empty($sid)) {
            $this->var['groupid'] = $sid;
        }
    }

    /**
     * Возвращает выбранную пользователем дату
     * @param $var
     */
    private function getSdate($var)
    {
        $sdate = $var['sdate'];
        if (!empty($sdate) && preg_match('/^\d{4}[-]\d{2}[-]\d{2}$/', $sdate)) {
            $this->var['sdate'] = $this->getDateFromString($sdate, 'Y-m-d');
        } else {
            $this->var['sdate'] = $this->getDateFromString(null, 'Y-m-d');
        }

    }

    /**
     * Возвращает ид сессии
     */
    private function getSessionId()
    {
        $sid = session_id();
        if (!empty($sid)) {
            $this->var['session'] = $sid;
        }
    }

    /**
     * Возвращает пароль  авторизации
     * @param $var
     */
    private function getAuthPass($var)
    {
        $pass = $var['passir'];
        $pass = stripslashes($pass);
        $pass = htmlspecialchars($pass);
        $pass = trim($pass);

        if (!empty($pass)) {
            $this->var['passr'] = $pass;
        }
    }

    /**
     * Возвращает пароль  регистрации
     * @param $var
     */
    private function getRegPass($var)
    {
        $pass = $var['passin'];
        $pass = stripslashes($pass);
        $pass = htmlspecialchars($pass);
        $pass = trim($pass);

        if (!empty($pass)) {
            $this->var['pass'] = $pass;
        }
    }

    //-----------------------Служебные методы----------------------------------
    /**
     * Возвращает дату в заданном формате
     * @param $date
     * @param $mask
     * @return DateTime
     */
    private function getDateFromString($date, $mask)
    {
        $dateRez = DateTime::createFromFormat($mask, $date);
        if (!$dateRez) {
            $dateRez = new DateTime();
        }
        return $dateRez;
    }

    private function unsetInputData()
    {
        unset($_GET);
        unset($_POST);
    }

    public function getInputJson()
    {
        $input_data = JsonUtils::jsonToVar(file_get_contents('php://input'));
        /*$log_file = "counter.log";
        $f = fopen($log_file, "a+");
        fputs($f, file_get_contents('php://input'));
        fclose($f);*/
        return $input_data;

    }
}