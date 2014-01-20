<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>MakeMy</title>

<script type="text/javascript" src="/js/jquery-1.3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/menu3.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/calendar.js" charset="utf-8"></script>

<link rel="stylesheet" type="text/css" href="/css/style.css"/>
<link rel="stylesheet" type="text/css" href="/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="/css/auth.css"/>
<link rel="stylesheet" type="text/css" href="/css/addevent.css"/>
</head>
<body>
<div class="container">
	<?php include "ViewHeader.php"; ?>
        
    <?php 
    	if (null != $content_view)  {
    		include 'application/view/'.$content_view; 	
    	}
    ?>
  
  	<?php include "ViewFooter.php"; ?>
  	 <div style="clear: both"></div>
</div>
</body>
</html>