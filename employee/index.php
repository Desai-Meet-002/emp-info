<?php
include_once('includes/Connection.php');
$message="";

if (isset($_REQUEST['btnsubmit'])) 
{
	$filename=$_FILES['profile']['name'];
	$type=$_FILES['profile']['type'];
	$tempname=$_FILES['profile']['tmp_name'];
	$ourpath="images/$filename";
	$error=$_FILES['profile']['error'];

	$username=$_REQUEST['username'];
	$dob=$_REQUEST['dob'];
	$city=$_REQUEST['city'];
	$state=$_REQUEST['state'];
	$country=$_REQUEST['country'];
	$department=$_REQUEST['department'];
	$gender=$_REQUEST['gender'];
	$sql="INSERT INTO emp_info(`emp_name`, `emp_dob`, `emp_city`, `emp_state`, `emp_country`, `emp_department`,  `emp_gender`) VALUES ('$username','$dob','$city','$state','$country','$department','$gender')";

	if ($type=="image/png" || $type=="image/jpeg") 
	{
		$sql="INSERT INTO emp_info(`emp_name`, `emp_dob`, `emp_city`, `emp_state`, `emp_country`,`emp_department`,  `emp_gender`, `emp_profile_img`) VALUES ('$username','$dob','$city','$state','$country','$department','$gender','$ourpath')";
	}
	else{
		echo "<h3>profile image not upload </h3>";
	}

	// exit($sql);
	if (mysqli_query($con,$sql)) 
	{
		$message="Record Save.....";
	}
	else
	{
		$message="Record Not Save.....";
	}

	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>

<h2>Enter your information</h2>

<form action="" method="post" enctype="multipart/form-data">
	<p>Emp Name : <input type="text" name="username" id="username" ></p>
	<p>D O B : <input type="date" name="dob" id="dob"></p>
	<p>City : 
	<select name="city" id="city">
        <option value="" disabled selected>Choose option</option>
        <option value="Ahmedabad">Ahmedabad</option>
        <option value="Surat">Surat</option>
        <option value="Baroda">Baroda</option>
        <option value="Rajkot">Rajkot</option>
        <option value="Strawberry">Strawberry</option>
    </select></p>	
	<p>state : 
	<select name="state" id="state">
        <option value="" disabled selected>Choose option</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Bihar">Bihar</option>
        <option value="West Bengal">West Bengal</option>
    </select></p>
	<p>country : 
	<select name="country" id="country">
        <option value="" disabled selected>Choose option</option>
        <option value="India">India</option>
        <option value="United States">United States</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Brazil">Brazil</option>
    </select></p>
	<p>department : 
	<select name="department" id="department">
        <option value="" disabled selected>Choose option</option>
        <option value="Software Development">Software Development</option>
        <option value="Network Administration">Network Administration</option>
        <option value="Cybersecurity">Cybersecurity</option>
        <option value="Data Analytics">Data Analytics</option>
    </select></p>
	<p>gender <br> <input type="radio" name="gender" id="gender" value="male"> Male   <input type="radio" name="gender" id="gender" value="Female">Female</p>

	<p>Upload Your Profile Images : <input type="file" name="profile" id="profile"> </p>

	<p> <input type="submit" name="btnsubmit" id="btnsubmit"></p>

</form>

<a href="AllUserstable.php">Click Here to Show All Users</a>

<?php
	echo "<p>$message</p>";	
if (isset($_REQUEST['btnsubmit'])) 
{
	if ($error==0) {
		if ($type=="image/png" || $type=="image/jpeg") {
			if (move_uploaded_file($tempname,$ourpath)) {
				echo "<h3>File Upload Sucess..</h3>";
			}
			else
			{
				echo "<h3>File Not Upload </h3>";
			}
		}
		else{
			echo "<h3>Sorry ! Invaild File Format. </h3>";
		}
	}
	else{
		echo "<p>Invaild File.</p>";
	}
}
?>


</body>
</html>