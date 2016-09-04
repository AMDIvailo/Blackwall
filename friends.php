<?php
require_once("functions.php");
//if(!isIndexPage())
//{
//	redirect("/Blackwall");
//	exit;
//}
function checkFriendShip($userId1, $userId2)
{
    global $connection;
    $_checkFriendShip = "select * from friends where userid1=$userId1 and userid2=$userId2";
    $checkFriendShip = mysqli_query($connection, $_checkFriendShip);
    if($CheckFriendShip = mysqli_fetch_assoc($checkFriendShip))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function listFriends($userid)
{
    global $connection;
    $_listFriends = "select * from friends where userid1=$userid or userid2=$userid";
    $listFriends = mysqli_query($connection, $_listFriends);
    while($ListFriends = mysqli_fetch_assoc($listFriends))
    {
        if($ListFriends['userid1'] == $userid)
        {
            $Users[] = $ListFriends['userid2'];
        }
        else
        {
            $Users[] = $ListFriends['userid1'];
        }
    }
    return $Users;
}

?>
