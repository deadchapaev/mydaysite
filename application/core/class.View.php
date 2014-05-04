<?php
namespace application\core;
class View
{
    protected $data;
    protected $content_view;

    function __construct($data = null)
    {
        $this->data = $data;
    }

    public function setContentView($content_view)
    {
        $this->content_view = $content_view;
    }

    function generate($content_view, $template_view, $data = null)
    {
        $template = new $template_view($data);
        $template->setContentView($content_view);
        $template->getBody();

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
