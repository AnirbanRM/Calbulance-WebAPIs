

<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Hospital = mysqli_escape_string($conn,$_POST['HospitalID']);
$Cid = mysqli_escape_string($conn,$_POST['clientID']);
$Pat_Name = mysqli_escape_string($conn,$_POST['PatientName']);
$Pat_Cont = mysqli_escape_string($conn,$_POST['PatientContact']);
$Pat_Addr = mysqli_escape_string($conn,$_POST['PatientAddress']);
$DoctorName = mysqli_escape_string($conn,$_POST['DoctorName']);
$DoctorType = mysqli_escape_string($conn,$_POST['DoctorType']);
$AppDate = mysqli_escape_string($conn,$_POST['AppDate']);
$AppTime = mysqli_escape_string($conn,$_POST['AppTime']);


$query = "INSERT INTO Appointments(HospitalId,clientID,DateTime,PatientName,Address,Contact,Doctor,DoctorType,AppointmentDateTime,Status) values('".$Hospital."','".$Cid."','".date("Y-m-d H:i:s")."','".$Pat_Name."','".$Pat_Addr."','".$Pat_Cont."','".$DoctorName."','".$DoctorType."','".$AppDate." ".$AppTime."','P');";

if(mysqli_query($conn,$query))
	echo "SUCCESS";


?>
