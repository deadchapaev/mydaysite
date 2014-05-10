<?php
namespace application\view\template;

use application\core\View;

class ViewTemplateApiJson extends View
{
    function __construct($data = null)
    {
        parent::__construct($data);
    }

    function getBody()
    {
        if (null != $this->content_view) {
            $this->content_view->getBody();
        }
    }

    function getCss()
    {
    }

    function getJs()
    {
    }
}

?>