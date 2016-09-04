<style>
.navbar
{
    border-radius: 0px;
}
</style>
<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
?>
<?php
$user = new User($_SESSION['username']);
$userId = $user->getUserId();
?>
<div id="menu">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Blackwall</a>
        </div>
        <ul class="nav navbar-nav">
    <li><a href="http://91.235.250.82/Blackwall/?sub=wall">Wall</a></li>
    <li><a href="http://91.235.250.82/Blackwall/?sub=profile&profileid=<?php print $userId ?>">My Profile Settings</a></li>
    <li><a href="http://91.235.250.82/Blackwall/?sub=profilewall&profileid=<?php print $userId ?>">My Profile Wall</a></li>
    </ul>
      </div>
    </nav>
</div>