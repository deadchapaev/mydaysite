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
        $data['err'] = false;
        $var = $this->getInputVarArray();

        if (isset($var['email']) && isset($var['pass'])) {
            if ($this->userDao->userAuthentication($var['email'], $var['pass'])) {
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

    public function register()
    {
        $data['err'] = false;
        $var = $this->getInputVarArray();
        if (isset($var['email']) && isset($var['pass']) && isset($var['login'])) {
            if (!$this->userDao->checkPresentUserName($var['login'])) {

                $rez = $this->userDao->registerUser($var['login'], $var['pass'], $var['email']);
                if ($rez > 0) {
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

}

?>