<?php
require_once "/application/core/class.View.php";
include_once "ViewHeader.php";
include_once "ViewFooter.php";
class ViewMain extends View
{
    private $viewHeader;
    private $viewFooter;

    function __construct($data = null)
    {
        $this->viewHeader = new ViewHeader($data);
        $this->viewFooter = new ViewFooter($data);
        parent::__construct($data);

    }

    function getBody()
    {
        ?>
        <!DOCTYPE HTML>
        <html>
        <head>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>MakeMyDay</title>
            <?php $this->getCss();
            $this->getJs(); ?>

        </head>
        <body>
        <div class="container">

            <?php $this->viewHeader->getBody();

            if (null != $this->content_view) {
                $this->content_view->getBody();
            }
            $this->viewFooter->getBody();
            ?>

            <div style="clear: both"></div>
        </div>
        </body>
        </html>
    <?php
    }

    function getCss()
    {
        echo '<link rel="stylesheet" type="text/css" href="/css/style.css"/>';
        $this->viewHeader->getCss();
        $this->viewFooter->getCss();
        if (null != $this->content_view) {
            $this->content_view->getCss();
        }
    }

    function getJs()
    {
        echo '<script type="text/javascript" src="/js/jquery-1.3.min.js" charset="utf-8"></script>';
        $this->viewHeader->getJs();
        $this->viewFooter->getJs();
        if (null != $this->content_view) {
            $this->content_view->getjs();
        };
    }
}

?>

