<?php
require_once "/application/model/db/dao/class.UserDao.php";
require_once "/application/model/db/dao/class.EventgroupDao.php";
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 29.03.14
 * Time: 11:28
 */

if (isset($_POST)) {
    $input_data = jsonToVar(file_get_contents('php://input'));
    $user = authUser($input_data);
    if (null === $user) {
        print_r(varToJson(array("error" => "User is incorrect!")));
        die;
    }

    switch ($input_data['action']) {
        case "getUserGroups":
            //print_r(varToJson(getUserGroups($user->id)));
            break;

        default:
            print_r(varToJson(array("error" => "Action is incorrect!")));
            die;
            break;
    }

} else {
    echo 'Not Post';
}


/**
 * авторизация пользователя в апи
 */
function authUser($input_data)
{

    $mail_pass = preg_split('[:]', base64_decode($input_data["authorization"]));
    $userDao = new UserDao();
    $user = new User();
    $user->session = $input_data["session"];
    $user->email = $mail_pass[0];
    $user->pass = $mail_pass[1];
    $userout = $userDao->getUserBySession($user);
    if ($userout === null) {
        $userout = $userDao->userAuthentication($user);

    }
    return $userout;

}

/**
 * получение списка групп по ид пользователя
 */
function getUserGroups($userId)
{
    $eventgroupDao = new EventgroupDao();
    return $eventgroupDao->getEventgroups($userId);

}


//-------------------json-var----var-json-----------------------//
function varToJson($var)
{
    return preg_replace_callback(
        '/\\\u([0-9a-fA-F]{4})/', create_function('$_m', 'return mb_convert_encoding("&#" . intval($_m[1], 16) . ";", "UTF-8", "HTML-ENTITIES");'),
        json_encode($var)
    );
}

function jsonToVar($json)
{
    return json_decode($json, TRUE);

}


?>