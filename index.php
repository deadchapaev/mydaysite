<html>
<head>
	<title></title>
</head>
<body>
	<?php
		//require_once "dbapi/EventgroupDao.php";
		//require_once "dbapi/UserDao.php";
		require_once "dbapi/class.EventDao.php";

		//$user = new User();
		//if($user->checkUser("chapa", "ololo123")) print_r("111");

		//echo checkUser("chapa", "ololo1231");
		//echo $user->registerUser("chapa2", "ololo1234", "hello2@pido.ru");
		//if($user->userAuthentication("chapa2", "ololo1234")) 
		//	print_r("Welcome!");
		//$a = getUserGroups(16);
		//print_r($a);
		//$usergroup = new EventgroupDao();
		
		//print_r($usergroup->getUserGroups(16));
		//print_r($b);

		
		$eventDao = new EventDao();
		$a = $eventDao->getEvents(0,'2013-11-17');
		print_r($a[0]->eventdate);
		print_r($a[1]->eventdate);

	?>
</body>
</html>
