<?php
namespace application\model\bl;
class JsonUtils
{

    static function varToJson($var)
    {
        return preg_replace_callback(
            '/\\\u([0-9a-fA-F]{4})/', create_function('$_m', 'return mb_convert_encoding("&#" . intval($_m[1], 16) . ";", "UTF-8", "HTML-ENTITIES");'),
            json_encode($var)
        );
    }

    static function jsonToVar($json)
    {
        return json_decode($json, TRUE);

    }
}


?>