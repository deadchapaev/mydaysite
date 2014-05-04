<?php
namespace application\controller;

use application\core\Controller;

class ControllerMain extends Controller
{

    function actionDefault()
    {
        if (null !== $this->getUser()->id) {
            header('Location: /Event');
        } else {
            header('Location: /User');
        }
    }
}

?>