<?php
    
    if (isset($_POST['emailr'])) { $email = $_POST['emailr']; if ($email == '') { unset($email);} } 
    if (isset($_POST['passir'])) { $pass=$_POST['passir']; if ($pass =='') { unset($pass);} }
    if (isset($_POST['loginr'])) { $login=$_POST['loginr']; if ($nik =='') { unset($nik);} }

 if (empty($email) or empty($pass) or empty($login) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    //удаляем лишние пробелы
    $login = trim($login);
    $pass = trim($pass);
 // подключаемся к базе
    include ("userDao.php");
    
    if (checkPresentUserName($login) == 'false' && checkPresentEmain($email)) {
        $rez = registerUser($login, $pass, $email);
        if ($rez == 'TRUE') {
            echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
        } else {
            echo "Ошибка! Вы не зарегистрированы.";
        }
    }
 ?>