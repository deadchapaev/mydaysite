<?php
namespace application\view;

use application\core\View;

class ViewApiJson extends View
{
    function __construct($data = null)
    {
        $this->data = $data;
    }

    function getBody()
    {
        print_r($this->data['json']);
    }
}