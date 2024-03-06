<?php
$HOST="localhost";
$USERNAME="root";
$PASSWORD="";
$DB="employee";

$con=mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB);
// $con=mysqli_connect("localhost","root","","employee");

if (!$con) 
{
	die("Sorry ! Server Not Connected......");
	// exit()
}
?>