<?php
function autoLoader($className)
{
    //Directories added here must be relative to the script going to use this file
    $directories = array(
        '',
        //'application'
    );

    //Add your file naming formats here
    $fileNameFormats = array(
        '%s.php',
        //'%s.class.php',
        'class.%s.php',
        //'%s.inc.php'
    );


    $path = str_ireplace('\\', '/', $className);

    //попробуем согласно концепции подписи имени класса
    $fileName = substr($path, strripos($path, '/') + 1, strlen($path));
    $pathToFile = substr($path, 0, strripos($path, '/') + 1);
    if (@include_once $pathToFile . sprintf('class.%s.php', $fileName)) {
        return;
    }

    //если сразу попали в цель
    if (@include_once $path . '.php') {
        return;
    }


    //для других случаев
    foreach ($directories as $directory) {
        foreach ($fileNameFormats as $fileNameFormat) {
            $path = $pathToFile . sprintf($fileNameFormat, $fileName);
            if (file_exists($path)) {
                require_once $path;
                return;
            }
        }
    }
}

spl_autoload_register('autoLoader');

?>