<?php
/**
 * Created by PhpStorm.
 * User: chapaev
 * Date: 21.01.14
 * Time: 20:28
 */
class GetPostAnalyzer
{
    private $var;

    public function getVarArray()
    {
        if (isset($_POST['emailr'])) {
            $email = $_POST['emailr'];
            if (null != $email && "" != $email) {
                $this->var['email'] = $email;
            }
        }

        if (isset($_POST['emailin'])) {
            $email = $_POST['emailin'];
            if (null != $email && "" != $email) {
                $this->var['email'] = $email;
            }
        }

        if (isset($_POST['loginr'])) {
            $login = $_POST['loginr'];
            if (null != $login && "" != $login) {
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $login = trim($login);
                if ("" != $login) {
                    $this->var['login'] = $login;
                }
            }
        }

        if (isset($_POST['passir'])) {
            $pass = $_POST['passir'];
            if (null != $pass && "" != $pass) {
                $pass = stripslashes($pass);
                $pass = htmlspecialchars($pass);
                $pass = trim($pass);
                if ("" != $pass) {
                    $this->var['passr'] = $pass;
                }
            }
        }

        if (isset($_POST['passin'])) {
            $pass = $_POST['passin'];
            if (null != $pass && "" != $pass) {
                $pass = stripslashes($pass);
                $pass = htmlspecialchars($pass);
                $pass = trim($pass);
                if ("" != $pass) {
                    $this->var['pass'] = $pass;
                }
            }
        }

        //print_r($_POST);
        if (isset($_POST['event'])) {

            $event = $_POST['event'];
            if (null != $event && "" != $event) {
                $this->var['event'] = $event;
            }
        }

        if (isset($_POST['detail'])) {
            $detail = $_POST['detail'];
            if (null != $detail && "" != $detail) {
                $this->var['detail'] = $detail;
            }
        }

        if (isset($_POST['groupname'])) {
            $groupname = $_POST['groupname'];
            if (null != $groupname && "" != $groupname) {
                $this->var['groupname'] = $groupname;
            }
        }

        if (null !== session_id() && "" !== session_id()) {
            $this->var['session'] = session_id();
        }

        return $this->var;
    }

}