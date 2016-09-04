<div id="posts">
<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
     $manager = new UserMgr();
function getUserPosts($userid)
{
    global $connection;
    $_getUserPosts = "select * from profilewall where userid=$userid";
    $getUserPosts = mysqli_query($connection, $_getUserPosts);
    while($post= mysqli_fetch_assoc($getUserPosts))
    {
        $posts[] = $post;
    }
    return $posts;
}
if(isset($_GET['profileid']))
    {
        $userToView = $_GET['profileid'];
        if($manager->userExistsById($userToView))
            {
                $Posts = getUserPosts($userToView);
                foreach ($Posts as $Post)
                    {
                        if($Post['type'] == 0)//If post is NORMAL
                            {
                                print "Posted by ".userLink($Post['userid']);
                                print "<br/>";
                                print $Post['text'];
                                print "<br/>";
                            }
                    }
            }
        else
            {
                print "User does not exists!";
            }
    }
else
    {
        redirect("/Blackwall");
    }
?>
</div>