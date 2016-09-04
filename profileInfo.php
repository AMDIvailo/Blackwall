<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
if(isset($_GET['profileid']))
{
	$profileId = $_GET['profileid'];
	if($manager->userExistsById($profileId))
	{
		$profileName = $manager->idToUsername($profileId);
		$profile = new User($profileName);
		$profileEmail = $profile->getEmail();
        $profileDisplayName = $profile->getDisplayName();
		print $profileDisplayName;
	}
	else
	{
		print "User does not exists!";
		exit;
	}
}
else
{
	exit;
}
?>
<br />Name : <?php print $profileDisplayName; ?>
<br />Username: <?php print $profileName; ?>
<br />Id: <?php print $profileId; ?>
<br />Email: <?php print $profileEmail; ?>