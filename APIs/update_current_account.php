


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Sno=mysqli_escape_string($conn,$_POST['Sno']);
$Username=mysqli_escape_string($conn,$_POST['Username']);
$ID=mysqli_escape_string($conn,$_POST['ID']);
$CurrentPassword=mysqli_escape_string($conn,$_POST['CurrentPassword']);
$NewPassword=mysqli_escape_string($conn,$_POST['NewPassword']);

$query = "SELECT * from HospitalAuth where Sno=".$Sno." and AdminPwd = '".$CurrentPassword."';";
$query = mysqli_query($conn,$query);


if(mysqli_num_rows($query)==0)
	echo "WP";
else{
	if($NewPassword=="")
		$query = "Update HospitalAuth set Username='".$Username."' , AdminID='".$ID."' where Sno=".$Sno.";";
	else
		$query = "Update HospitalAuth set Username='".$Username."' , AdminID='".$ID."', AdminPwd = '".$NewPassword."' where Sno=".$Sno.";";

	if(mysqli_query($conn,$query))
		echo "Success";


}







?>
