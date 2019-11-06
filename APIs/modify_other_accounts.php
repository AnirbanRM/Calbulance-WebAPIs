<?php


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Sno = mysqli_escape_string($conn,$_POST['Sno']);

$query = "SELECT * from HospitalAuth where Sno = ".$Sno.";";

$query = mysqli_query($conn,$query);
$response = "";

while($ind_row = mysqli_fetch_assoc($query))
$response = "{'ID':'".str_replace("'","\'",$ind_row['AdminID'])."','Username':'".str_replace("'","\'",$ind_row['Username'])."','Acc_Type':'".str_replace("'","\'",$ind_row['Acc_Type'])."','PermissionCode':'".str_replace("'","\'",$ind_row['Permissions_Code'])."'}";

echo $response;

?>
