<?php
include_once "ViewHeader.php";
include_once "ViewFooter.php";
$viewHeader = new ViewHeader($data);
$viewFooter = new ViewFooter($data);
?>
<!DOCTYPE HTML>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MakeMyDay</title>

    <script type="text/javascript" src="/js/jquery-1.3.min.js" charset="utf-8"></script>

    <?php
    $viewHeader->getJs();
    $viewFooter->getJs();
    if (null != $content_view) {
        $content_view->getJs();
    }
    ?>

    <link rel="stylesheet" type="text/css" href="/css/style.css"/>


    <?php
    $viewHeader->getCss();
    $viewFooter->getCss();
    if (null != $content_view) {
        $content_view->getCss();
    }
    ?>

</head>
<body>
<div class="container">

    <?php $viewHeader->getBody(); ?>

    <?php
    if (null != $content_view) {
        $content_view->getBody();
    }
    ?>

    <?php $viewFooter->getBody(); ?>

    <div style="clear: both"></div>
</div>
</body>
</html>