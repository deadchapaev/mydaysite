<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once "dbapi/dao/class.UserDao.php";
		$userDao = new UserDao();
		//print_r($userDao->checkPresentEmain("hello1@pido.ru"));
		//$user = $userDao->getUser(161);
		//print_r($user->pass);
		$userDao->deleteUser(71);


	?>
</body>
</html>
