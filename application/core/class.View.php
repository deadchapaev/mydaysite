<?php

class View
{
    protected $data;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    function generate($content_view, $template_view, $data = null)
    {
        include 'application/view/' . $template_view;
    }

    function getCss()
    {

    }

    function getJs()
    {

    }

    function getBody()
    {

    }
}

?>
