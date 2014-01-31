<?php
require_once "/application/model/db/dao/class.UserDao.php";
class ModelUser extends Model
{
    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function login(&$data)
    {
        $data['err'] = false;
        $user = $this->getInputUser();
        if (null !== $user->email && null !== $user->pass) {
            $user = $this->userDao->userAuthentication($user);
            if (null !== $user) {
                $data['msg'] = 'Вы успешно вошли в систему, ' . $user->login . '!';
            } else {
                //если ошибка авторизации то редиректим на страничку ошибки
                $data['msg'] = 'Ошибка авторизации!';
                $data['err'] = true;
            }
        } else {
            $data['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $data['err'] = true;
        }
    }

    private function getInputUser()
    {
        $user = new User();
        $var = $this->getInputVarArray();

        if (isset($var['login'])) {
            $user->login = $var['login'];
        }
        if (isset($var['pass'])) {
            $user->pass = $var['pass'];
        }
        if (isset($var['passr'])) {
            $user->passr = $var['passr'];
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

    public function register(&$data)
    {
        $data['err'] = false;
        $user = $this->getInputUser();

        if (null != $user->email && null != $user->passr && null != $user->login) {
            if (!$this->userDao->checkPresentUserName($user)) {
                $rez = $this->userDao->registerUser($user);
                if ($rez !== null ) {
                    $data['msg'] = 'Вы успешно зарегистрировались, ' . $user->login . '!';
                    $this->findUser($data);
                } else {
                    $data['msg'] = 'Ошибка регистрации!';
                    $data['err'] = true;
                    $data['user'] = null;

                }
            } else {
                $data['msg'] = 'Ошибка регистрации! Такой пользователь уже есть!';
                $data['err'] = true;
                //$data['user'] = null;

            }
        } else {
            $data['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $data['err'] = true;
            $data['user'] = null;

        }

    }

    public function findUser(&$data)
    {
        $user = $this->getInputUser();

        $dbuser = $this->userDao->getUserBySession($user);
        if (null === $dbuser) {
            $dbuser = $this->userDao->userAuthentication($user);

        }

        if ($dbuser !== null) {
            $dbuser->session = $user->session;
            $this->userDao->updateUserSession($dbuser);
            $user = $dbuser;
        }

        $data['user'] = $user;

    }

    public function logout(&$data)
    {
        $user = $this->getInputUser();
        $dbuser = $this->userDao->getUserBySession($user);
        if (null !== $dbuser) {
            $dbuser->session = null;
            if ($this->userDao->updateUserSession($dbuser)) {
                $user = null;

            }
        }
        $data['user'] = $user;
        $data['msg'] = 'Вы вышли из системы!';

        session_regenerate_id();
        session_destroy();





    }
}

?>