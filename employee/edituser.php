<?php
include_once('includes/Connection.php');
include_once('includes/Functions.php');

if(isset($_REQUEST['btnupdate']))
{
	$userid=$_REQUEST['idno'];
	$username=$_REQUEST['username'];
	$dob=$_REQUEST['dob'];
	$city=$_REQUEST['city'];
	$state=$_REQUEST['state'];
	$country=$_REQUEST['country'];
	$department=$_REQUEST['department'];
	$gender=$_REQUEST['gender'];

	if(updateUser($con,$userid,$username,$dob,$city,$state,$country,$department,$gender))
	{
		header("Location:AllUserstable.php");
	}
	else
	{
		exit("Sorry ! Not Updated.....");
	}
}


if (isset($_REQUEST['uid'])) 
{
	$userid=$_REQUEST['uid'];

	$user=getUserById($con,$userid);

	$total=mysqli_num_rows($user);

	$username="";
	$dob="";
	$city="";
	$state="";
	$country="";
	$department="";
	$gender="";

	if ($total>0) 
	{		
		while($row=mysqli_fetch_assoc($user)) 
		{
			$username=$row['emp_name'];
			$dob=$row['emp_dob'];
			$city=$row['emp_city'];
			$state=$row['emp_state'];
			$country=$row['emp_country'];
			$department=$row['emp_department'];
			$gender=$row['emp_gender'];
		}
	}
	else
	{
		echo "Sorry ! Record Not Found.....";
	}
}
else 
{
	exit("Sorry ! Bad Request.....");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Edit User Profiel</h1>

	<form action="" method="post">

	<p>
		User Id : <input type="text" name="userid" id="userid" readonly="readonly" value="<?php echo $userid; ?>">
		<input type="hidden" name="idno" id="idno" value="<?php echo $userid; ?>">
	</p>
	<p>Emp Name : <input type="text" name="username" id="username" value="<?php echo $username; ?>"></p>
	<p>D O B : <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>"></p>
	<p>City :
	<select name="city" id="city" value="">
	<?php
			$city1="";
			$city2="";
			$city3="";
			$city4="";
			$city5="";
			switch ($city) {
				case "Ahmedabad":
					$city1="selected";
					break;
				case "Surat":
					$city2="selected";
					break;
				case "Baroda":
					$city3="selected";
					break;
				case "Rajkot":
					$city4="selected";
					break;
				case "Strawberry":
					$city5="selected";
					break;
				default:
					echo "Invalid!";
			}
		?>
        <option value="">Choose option</option>
        <option value="Ahmedabad" <?php echo $city1; ?>>Ahmedabad</option>
        <option value="Surat" <?php echo $city2; ?>>Surat</option>
        <option value="Baroda" <?php echo $city3; ?>>Baroda</option>
        <option value="Rajkot" <?php echo $city4; ?>>Rajkot</option>
        <option value="Strawberry" <?php echo $city5; ?>>Strawberry</option>
    </select></p>	
	<p>state : 
	<select name="state" id="state" >
	<?php
			$state1="";
			$state2="";
			$state3="";
			$state4="";
			$state5="";
			switch ($state) {
				case "Uttar Pradesh":
					$state1="selected";
					break;
				case "Gujarat":
					$state2="selected";
					break;
				case "Karnataka":
					$state3="selected";
					break;
				case "Bihar":
					$state4="selected";
					break;
				case "West Bengal":
					$state5="selected";
					break;
				default:
					echo "Invalid!";
			}
		?>
        <option value="">Choose option</option>
        <option value="Uttar Pradesh" <?php echo $state1; ?>>Uttar Pradesh</option>
        <option value="Gujarat" <?php echo $state2; ?>>Gujarat</option>
        <option value="Karnataka" <?php echo $state3; ?>>Karnataka</option>
        <option value="Bihar" <?php echo $state4; ?>>Bihar</option>
        <option value="West Bengal" <?php echo $state5; ?>>West Bengal</option>
    </select></p>
	<p>country : 
	<select name="country" id="country">
	<?php
			$country1="";
			$country2="";
			$country3="";
			$country4="";
			switch ($country) {
				case "India":
					$country1="selected";
					break;
				case "United States":
					$country2="selected";
					break;
				case "Indonesia":
					$country3="selected";
					break;
				case "Brazil":
					$country4="selected";
					break;
				default:
					echo "Invalid!";
			}
		?>
        <option value="">Choose option</option>
        <option value="India" <?php echo $country1; ?>>India</option>
        <option value="United States" <?php echo $country2; ?>>United States</option>
        <option value="Indonesia" <?php echo $country3; ?>>Indonesia</option>
        <option value="Brazil" <?php echo $country4; ?>>Brazil</option>
    </select></p>
	<p>department : 
	<select name="department" id="department" value="<?php echo $department; ?>">
	<?php
			$department1="";
			$department2="";
			$department3="";
			$department4="";
			$department5="";
			switch ($department) {
				case "Software Development":
					$department1="selected";
					break;
				case "Network Administration":
					$department2="selected";
					break;
				case "Cybersecurity":
					$department3="selected";
					break;
				case "Data Analytics":
					$department4="selected";
					break;
				default:
					echo "Invalid!";
			}
		?>
        <option value="">Choose option</option>
        <option value="Software Development" <?php echo $department1; ?>>Software Development</option>
        <option value="Network Administration" <?php echo $department2; ?>>Network Administration</option>
        <option value="Cybersecurity" <?php echo $department3; ?>>Cybersecurity</option>
        <option value="Data Analytics" <?php echo $department4; ?>>Data Analytics</option>
    </select></p>
	<p>gender <br> 
	<?php  
	$gender1="";
	$gender2="";
	switch ($gender) {
		case "male":
			$gender1="checked=\"checked\"";
			break;
		case "Female":
			$gender2="checked=\"checked\"";
			break;
		default:
			echo "Invalid!";
		}
	?>
	
		<input type="radio" name="gender" id="gender" value="male" <?php echo $gender1; ?>> Male   
		<input type="radio" name="gender" id="gender" value="Female" <?php echo $gender2; ?>>Female
	</p>

		<p> <input type="submit" value="Update Now" name="btnupdate" id="btnupdate"></p>
	</form>

</body>
</html>
