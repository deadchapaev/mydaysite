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
                    $this->var['pass'] = $pass;
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

        return $this->var;
    }

}