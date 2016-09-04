<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	break;
}
if(isset($_GET['profileid']))
{
	$manager = new UserMgr();
	$myId = $manager->UsernameToId($_SESSION['username']);
	if($_GET['profileid'] == $myId) //If this is user' s own profile
	{
		require("profileSettings.php");
	}
	else
	{
		require("profileInfo.php");
	}
}
?>
