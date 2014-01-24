<?php
require_once "/application/model/db/dao/class.UserDao.php";
class ModelUser extends Model
{
    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function login()
    {
        $data['err'] = false;
        $user = $this->getInputUser();
        if (null !== $user->email && null !== $user->pass) {
            if ($this->userDao->userAuthentication($user)) {
                $data['msg'] = 'Вы успешно вошли в систему!';
            } else {
                //если ошибка авторизации то редиректим на страничку ошибки
                $data['msg'] = 'Ошибка авторизации!';
                $data['err'] = true;
            }
        } else {
            $data['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $data['err'] = true;
        }

        return $data;
    }

    public function getInputUser()
    {
        $user = new User();
        $var = $this->getInputVarArray();

        if (isset($var['login'])) {
            $user->login = $var['login'];
        }
        if (isset($var['pass'])) {
            $user->pass = $var['pass'];
        }
        if (isset($var['name'])) {
            $user->name = $var['name'];
        }
        if (isset($var['sname'])) {
            $user->sname = $var['sname'];
        }
        if (isset($var['avatar'])) {
            $user->avatar = $var['avatar'];
        }
        if (isset($var['regdate'])) {
            $user->regdate = $var['regdate'];
        }
        if (isset($var['bdate'])) {
            $user->bdate = $var['bdate'];
        }
        if (isset($var['email'])) {
            $user->email = $var['email'];
        }
        if (isset($var['session'])) {
            $user->session = $var['session'];
        }

        return $user;
    }

    public function register()
    {
        $data['err'] = false;
        $user = $this->getInputUser();
        if (null != $user->email && null != $user->pass && null != $user->login) {
            if (!$this->userDao->checkPresentUserName($user)) {
                $rez = $this->userDao->registerUser($user);
                if ($rez !== null) {
                    $data['msg'] = 'Вы успешно зарегистрировались!';
                } else {
                    $data['msg'] = 'Ошибка регистрации!';
                    $data['err'] = true;
                }
            } else {
                $data['msg'] = 'Ошибка регистрации! Такой пользователь уже есть!';
                $data['err'] = true;
            }
        } else {
            $data['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $data['err'] = true;
        }

        return $data;
    }

    public function findUser()
    {
        $user = $this->getInputUser();
        $dbuser = $this->userDao->getUserBySession($user);
        if (null === $dbuser) {
            $dbuser = $this->userDao->userAuthentication($user);
        }

        if ($dbuser !== null) {
            $dbuser->session = $user->session;
            if ($this->userDao->updateUserSession($dbuser)) {
                $user = $dbuser;
            }
        }
        return $user;
    }

    public function unlogUser()
    {
        $user = $this->getInputUser();
        $dbuser = $this->userDao->getUserBySession($user);
        if (null !== $dbuser) {
            $dbuser->session = null;
            if ($this->userDao->updateUserSession($dbuser)) {
                $user = $dbuser;
            }
        }

        return $user;

    }
}

?>