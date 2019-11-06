
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Hid = mysqli_escape_string($conn,$_POST['HospitalId']);

$query = "SELECT * from Appointments where HospitalId='".$Hid."';";

$query = mysqli_query($conn,$query);

$response="{'Appointments':[";

while($ind_row=mysqli_fetch_assoc($query))
	$response=$response."{'App_Id':'".str_replace("'","\'",$ind_row['AppId'])."','DateTime':'".str_replace("'","\'",$ind_row['DateTime'])."','PatientName':'".str_replace("'","\'",$ind_row['PatientName'])."','Address':'".str_replace("'","\'",$ind_row['Address'])."','Contact':'".str_replace("'","\'",$ind_row['Contact'])."','Doctor':'".str_replace("'","\'",$ind_row['Doctor'])."','DoctorType':'".str_replace("'","\'",$ind_row['DoctorType'])."','AppointmentDateTime':'".str_replace("'","\'",$ind_row['AppointmentDateTime'])."','Status':'".str_replace("'","\'",$ind_row['Status'])."'},";

$response=rtrim($response,',')."]}";

echo $response;















?>
