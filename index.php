<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
session_start();
?>
<html>
<head>
<title>Blackwall</title>
</head>
<body>
<?php
require("easyauth/user.php");
require("easyauth/userMgr.php");
$manager = new UserMgr();
if($manager->sessionExists())
{
	$user = new User($_SESSION['username']);
	if($user->exists())
	{
		require("contentController.php");
	}
	else
	{
		$manager->deleteSession();
		redirect("/Blackwall");
	}
}
else
{
	require("login.php");
}
?>
</body>
</html>
