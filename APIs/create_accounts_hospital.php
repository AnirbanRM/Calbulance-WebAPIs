
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital = mysqli_escape_string($conn,$_POST['Hospital']);
$Username = mysqli_escape_string($conn,$_POST['Username']);
$ID = mysqli_escape_string($conn,$_POST['ID']);
$Acc_Type = mysqli_escape_string($conn,$_POST['Acc_Type']);
$PermissionCode = mysqli_escape_string($conn,$_POST['PermissionCode']);


if($Acc_Type=="A")
	$PermissionCode="P111111";


$Password="";
for($i = 0;$i<10;$i++)
	$Password = $Password.chr(rand(65,90));

$query = "INSERT INTO HospitalAuth(RegNo,Username,AdminID,AdminPwd,Acc_Type,Permissions_Code) values('".$hospital."','".$Username."','".$ID."','".$Password."','".$Acc_Type."','".$PermissionCode."');";

if(mysqli_query($conn,$query))
	echo $Password;













?>
