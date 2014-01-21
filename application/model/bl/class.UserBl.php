<?php
require_once "/application/model/db/dao/class.UserDao.php";
require_once "/application/model/bl/class.GetPostAnalyzer.php";
class UserBl
{

    private $userDao;
    private $getPostVar;

    function __construct()
    {
        $this->userDao = new UserDao();
        $this->getPostVar = new GetPostAnalyzer();
    }


    public function login()
    {

        $var = $this->getPostVar->getVarArray();
        if (isset($var['email']) && isset($var['pass'])) {
            if ($this->userDao->userAuthentication($var['email'], $var['pass'])) {
                $_SESSION['msg'] = 'Вы успешно вошли в систему!';
                header('Location:/Info');
            } else {
                //если ошибка авторизации то редиректим на страничку ошибки
                $_SESSION['msg'] = 'Ошибка авторизации!';
                header('Location:/Info/Error');
            }

        } else {
            exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }


    }

    public function register()
    {
        $var = $this->getPostVar->getVarArray();
        if (isset($var['email']) && isset($var['pass']) && isset($var['login'])) {
            if (!$this->userDao->checkPresentUserName($var['login'])) {

                $rez = $this->userDao->registerUser($var['login'], $var['pass'], $var['email']);
                if ($rez > 0) {
                    $_SESSION['msg'] = 'Спасибо за регистрацию,' . $var['login'] . '!';
                    header('Location:/Info');
                } else {
                    echo "Ошибка! Вы не зарегистрированы";
                }

            } else {
                $_SESSION['msg'] = 'Ошибка регистрации! Такой пользователь уже есть!';
                header('Location:/Info/Error');
            }
        } else {
            $_SESSION['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            header('Location:/Info/Error');
        }


    }

}

?>