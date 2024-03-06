<?php
function getAllUsers($con)
{
	$sql="SELECT * FROM  emp_info ORDER BY emp_id DESC";

	$records=mysqli_query($con,$sql);

	return $records;
}

function getUserById($con,$uid)
{
	$sql="SELECT * FROM emp_info WHERE emp_id ='$uid'";

	$records=mysqli_query($con,$sql);

	return $records;
}

function updateUser($con,$userid,$username,$dob,$city,$state,$country,$department,$gender)
{
	$sql="UPDATE `emp_info` SET `emp_name`='$username',`emp_dob`='$dob',`emp_city`='$city',`emp_state`='$state',`emp_country`='$country',`emp_department`='$department',`emp_gender`='$gender' WHERE `emp_id`='$userid';";

	if(mysqli_query($con,$sql))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function deleteUser($con,$userid)
{
	$sql="DELETE FROM emp_info WHERE `emp_id`='$userid';";

	if(mysqli_query($con,$sql))
	{
		return true;
	}
	else
	{
		return false;
	}
}
