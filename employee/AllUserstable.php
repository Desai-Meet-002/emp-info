<?php
include_once('includes/Connection.php');
include_once('includes/Functions.php');

$allusers=getAllUsers($con);
$total=mysqli_num_rows($allusers);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			border:1px solid black;
		}
	</style>
</head>
<body>

<h2>All User Records</h2>

<?php
	if($total>0)
	{
		echo "<h3>Congratulation ! Records Found.....</h3>";
		echo " <table border=\"1\" cellspacing=\"0\" cellpadding=\"10\">";
			echo " <tr>";
				echo " <th>Profile Photo</th>";
				echo " <th>emp_id</th>";
				echo " <th>Emp Name</th>";
				echo " <th>D O B</th>";
				echo " <th>City</th>";
				echo " <th>state</th>";
				echo " <th>country</th>";
				echo " <th>gender</th>";
				echo " <th>department</th>";
				echo "<th>Edit</th>";
				echo "<th>Delete</th>";
			echo " </tr>";

		while($row=mysqli_fetch_assoc($allusers)) 
		{
			$uid=$row['emp_id'];
				echo "<tr>";
					echo "<td><img src=\"".$row['emp_profile_img']."\"  width=\"100\"></td>";
					echo "<td>$uid </td>";
					echo "<td>" .$row['emp_name']. "</td>";
					echo "<td>" .$row['emp_dob']. "</td>";
					echo "<td>" .$row['emp_city']. "</td>";
					echo "<td>" .$row['emp_state']. "</td>";
					echo "<td>" .$row['emp_country']. "</td>";
					echo "<td>" .$row['emp_gender']. "</td>";
					echo "<td>" .$row['emp_department']. "</td>";
					echo "<td><a href=\"edituser.php?uid=$uid\"><img src=\"images/edit.png\"></a></td>";
					echo "<td>";
					echo "<span onclick=\"return confirm('Are You Sure to Delete IdNo : $uid ?')\">";
						echo "<a href=\"deleteuser.php?uid=$uid\"><img src=\"images/delete.png\"></a>";
					echo "</span>";
					echo "</td>";
				echo "</tr>";
		}
		echo "</table>";
	}

	else
	{
		echo "<h3>Sorry ! Records Not Found.....</h3>";
	}
?>
	<table ></table>
	
</body>
</html>