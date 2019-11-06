


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Hid = mysqli_escape_string($conn,$_POST['HOSPITAL']);
$Cid = mysqli_escape_string($conn,$_POST['CLIENT']);
$PName = mysqli_escape_string($conn,$_POST['PATIENT_NAME']);
$address = mysqli_escape_string($conn,$_POST['ADDRESS']);
$contact = mysqli_escape_string($conn,$_POST['CONTACT']);

$query = "INSERT INTO Requests(DateTime,HospitalId,ClientId,PatientName,Address, Status, ContactNo) values('".date("Y-m-d H:i:s")."','".$Hid."','".$Cid."','".$PName."','".$address."','P','".$contact."');";

$query = mysqli_query($conn,$query);
$l = mysqli_insert_id($conn);

echo $l;

?>
