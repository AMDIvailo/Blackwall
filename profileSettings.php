<?php
if(!isIndexPage())
{
	redirect("/Blackwall");
	exit;
}
if(isset($_GET['profileid']))
{
	$profileId = $_GET['profileid'];
	if($manager->userExistsById($_GET['profileid']))
	{
		$profileName = $manager->idToUsername($profileId);
	    $profile = new User($profileName);
		$profileEmail = $profile->getEmail();
        $profileDisplayName = $profile->getDisplayName();
        print "My Profile("."$profileDisplayName".") Settings";
	}
	else
	{
		print "Your profile does not exists!";
	}
}
else
{
	break;
}
?>
<br />Username: <?php print $profileName; ?>
<br />Name : <?php print $profileDisplayName; ?>
<br />Id: <?php print $profileId; ?>
<br />Email: <?php print $profileEmail; ?>