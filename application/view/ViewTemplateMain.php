<?php
namespace application\view;

use application\core\View;

class ViewTemplateMain extends View
{
    private $viewHeader;
    private $viewFooter;

    function __construct($data = null)
    {
        parent::__construct($data);
        $this->viewHeader = new ViewHeader($data);
        $this->viewFooter = new ViewFooter($data);
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
        echo '<link rel="stylesheet" type="text/css" href="/css/jquery-ui-1.10.4.custom.css"/>';

        $this->viewHeader->getCss();
        $this->viewFooter->getCss();
        if (null != $this->content_view) {
            $this->content_view->getCss();
        }
    }

    function getJs()
    {
//        echo '<script type="text/javascript" src="/js/jquery-1.3.min.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/jquery-1.10.2.js" charset="utf-8"></script>';
        echo '<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.js" charset="utf-8"></script>';

        $this->viewHeader->getJs();
        $this->viewFooter->getJs();
        if (null != $this->content_view) {
            $this->content_view->getjs();
        };
    }
}

?>