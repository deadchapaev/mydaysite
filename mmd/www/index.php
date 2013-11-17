<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once "dbapi/usercheck.php";
		//echo checkUser("chapa", "ololo1231");
		//echo registerUser("chapa", "ololo123", "hello@pido.ru");
		$a = getUserGroups(16);
		
		print_r($a);
		//$b = getUserGroupEvents(0);
		print_r("<br>");
		//print_r($b);

		print_r(getEvents(0,'2013-11-17'));
		

	?>
</body>
</html>
