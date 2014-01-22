<?php
require_once "/application/model/db/dao/class.UserDao.php";
require_once "/application/model/bl/class.GetPostAnalyzer.php";
class ModelUser extends Model
{

    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }


    public function login()
    {
        $rezVar['err'] = false;
        $var = $this->getInputVarArray();

        if (isset($var['email']) && isset($var['pass'])) {
            if ($this->userDao->userAuthentication($var['email'], $var['pass'])) {
                $rezVar['msg'] = 'Вы успешно вошли в систему!';
            } else {
                //если ошибка авторизации то редиректим на страничку ошибки
                $rezVar['msg'] = 'Ошибка авторизации!';
                $rezVar['err'] = true;
            }

        } else {
            $rezVar['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $rezVar['err'] = true;
        }

        return $rezVar;
    }

    public function register()
    {
        $rezVar['err'] = false;
        $var = $this->getInputVarArray();
        if (isset($var['email']) && isset($var['pass']) && isset($var['login'])) {
            if (!$this->userDao->checkPresentUserName($var['login'])) {

                $rez = $this->userDao->registerUser($var['login'], $var['pass'], $var['email']);
                if ($rez > 0) {
                    $rezVar['msg'] = 'Вы успешно зарегистрировались!';
                } else {
                    $rezVar['msg'] = 'Ошибка регистрации!';
                    $rezVar['err'] = true;
                }

            } else {
                $rezVar['msg'] = 'Ошибка регистрации! Такой пользователь уже есть!';
                $rezVar['err'] = true;
            }
        } else {
            $rezVar['msg'] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
            $rezVar['err'] = true;
        }

        return $rezVar;


    }

}

?>