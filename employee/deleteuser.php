<?php 
include_once('includes/Connection.php');
include_once('includes/Functions.php');

if (isset($_REQUEST['uid'])) 
{	
	$userid=$_REQUEST['uid'];

	if(deleteUser($con,$userid))
	{
		
		header("Location:AllUserstable.php");
	}
	else
	{
		exit("Sorry ! Recode Not Delete.....");
	}
	
}

?>

