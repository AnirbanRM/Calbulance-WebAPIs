

<?php


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Sno=mysqli_escape_string($conn,$_POST['Sno']);
$ID=mysqli_escape_string($conn,$_POST['ID']);
$Username = mysqli_escape_string($conn,$_POST['Username']);
$Acc_Type = mysqli_escape_string($conn,$_POST['Acc_Type']);
$Permission = mysqli_escape_string($conn,$_POST['Permission']);


$query = "update HospitalAuth set AdminID = '".$ID."',Username = '".$Username."',Acc_Type='".$Acc_Type."',Permissions_Code='".$Permission."' where Sno=".$Sno.";";

if(mysqli_query($conn,$query))
	echo "Success";


?>
