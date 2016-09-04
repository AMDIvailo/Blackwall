<?php
//require("easyauth/userMgr.php");


function isIndexPage()
{
	if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == "index")
	{
		return true;
	}
	else
	{
		return false;
	}
}

function redirect($url, $time=0)
{
	print "<META HTTP-EQUIV='refresh' CONTENT='$time; URL=$url'>";
}

function getSubPage()
{
	if(isset($_GET['sub']))
	{
		return $_GET['sub'];
	}
	else
	{
		return false;
	}
}

function userLink($userid)
{
    $transform = new UserMgr();
    $username = $transform->idToUsername($userid);
	return "<a href='/Blackwall/?sub=profilewall&profileid=$userid'>$username</a>";
}
?>
