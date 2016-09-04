<?php
require("functions.php");
if(!isIndexPage())
{
	redirect("/Blackwall");
	break;
}
//Require menu in all subs if logged in
require("menu.php");
switch(getSubPage())
{
	case "wall":
		require("wall.php");
		break;
	case "profile":
		require("profile.php");
		break;
	case "profilewall":
		require("profilewall.php");
		break;
	case false:
		require("wall.php");
		break;
}
?>
