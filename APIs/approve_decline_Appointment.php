

<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$AppID = mysqli_escape_string($conn,$_POST['AppointmentID']);
$c=mysqli_escape_string($conn,$_POST['command']);
if($c=="APPROVE")$c="A";
if($c=="DECLINE")$c="D";

$query = "update Appointments set Status = '".$c."' where AppId='".$AppID."';";

mysqli_query($conn,$query);

?>
