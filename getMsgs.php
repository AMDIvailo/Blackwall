<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("functions.php");
require("friends.php");
require_once("easyauth/user.php");
require_once("easyauth/userMgr.php");
/*if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
    }*/
$User = new User($_SESSION['username']);
$UserId = $User->getUserId();
function getWallPosts()
{
    global $connection;
    global $UserId;
    $friendList = listFriends($UserId);
    $friendIds = join("','",$friendList);
    $_getWallPosts = "select * from profilewall where userid in ('$friendIds', '$UserId')";
    $getWallPosts = mysqli_query($connection, $_getWallPosts);
    while($GetWallPosts = mysqli_fetch_assoc($getWallPosts))
    {
        $posts[] = $GetWallPosts;
    }
    return $posts;
}
$WallPosts = getWallPosts();
print "<div id='posts'>";
foreach ($WallPosts as $Post)
{
    if($Post['type'] == 0)//If post is NORMAL
    {
        print "Posted by ".userLink($Post['userid']);
        print "<br/>";
        print $Post['text'];
        print "<br/>";
    }
}
print "</div>";
?>