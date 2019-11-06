



<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);
$client = mysqli_escape_string($conn,$_POST['client']);

$query = "select AppId,HName,PatientName,Doctor,DoctorType,AppointmentDateTime,Status from Appointments,Hospitals where(Hospitals.RegNo=Appointments.HospitalId and clientId = '".$client."');";

$query = mysqli_query($conn,$query);

$response = '{"Prev_Appointments":[';

while($ind_row = mysqli_fetch_assoc($query))
	        $response = $response.'{"ID":"'.$ind_row['AppId'].'","AppDateTime":"'.$ind_row['AppointmentDateTime'].'","HospitalName":"'.$ind_row['HName'].'","PatientName":"'.$ind_row['PatientName'].'","Doctor":"'.$ind_row['Doctor'].'","DoctorType":"'.$ind_row['DoctorType'].'","Status":"'.$ind_row['Status'].'"},';

$response = rtrim($response,',').']}';

echo $response;


?>
