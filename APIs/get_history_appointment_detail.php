
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);
$id = mysqli_escape_string($conn,$_POST['ID']);

$query = "SELECT HName,DateTime,PatientName,Appointments.Contact,Appointments.Address,Doctor,DoctorType,AppointmentDateTime,Status from Appointments,Hospitals where (Hospitals.RegNo=Appointments.HospitalId and AppId = '".$id."');";

$query = mysqli_query($conn,$query);

$response="";

while($ind_row = mysqli_fetch_assoc($query))
	$response = '{"Hospital":"'.$ind_row['HName'].'","Booked_DT":"'.$ind_row['DateTime'].'","Pat_Name":"'.$ind_row['PatientName'].'","Pat_Con":"'.$ind_row['Contact'].'","Pat_Addr":"'.$ind_row['Address'].'","Doctor_Name":"'.$ind_row['Doctor'].'","Doctor_Type":"'.$ind_row['DoctorType'].'","Status":"'.$ind_row['Status'].'","AP_DT":"'.$ind_row['AppointmentDateTime'].'"}';


echo $response;


?>
