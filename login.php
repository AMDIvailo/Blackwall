<link rel="stylesheet" type="text/css" href="login.css" />
<?php
require("functions.php");
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
?>
<form method="post">
<div id="loginBox">
Username:<input type="text" name="username" /><br/>
Password:<input type="password" name="password" /><br/>
<input type="submit" name="enter" value="Enter Blackwall....." />
</form>
</div>
<?php
if(isset($_POST['username'], $_POST['password'], $_POST['enter']))
{
	if($_POST['username'] != "" && $_POST['password'] != "")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$manager = new UserMgr();
		$validLogin = $manager->validate($username, $password);
		if($validLogin)
		{
			print "Login succeeded!";
			$User = new User($username);
			$User->createSession();
			redirect("/Blackwall");
		}
		else
		{
			print "Incorrect username or/and password!";
		}
	}
}
?>
