


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);
$client = mysqli_escape_string($conn,$_POST['client']);

$query = "select Req_Id,DateTime,HName,PatientName,ContactNo,Status from Requests,Hospitals where(Hospitals.RegNo=Requests.HospitalId and clientId = '".$client."');";

$query = mysqli_query($conn,$query);

$response = '{"Prev_Ambulances":[';

while($ind_row = mysqli_fetch_assoc($query))
	$response = $response.'{"ID":"'.$ind_row['Req_Id'].'","DateTime":"'.$ind_row['DateTime'].'","HospitalName":"'.$ind_row['HName'].'","PatientName":"'.$ind_row['PatientName'].'","Contact":"'.$ind_row['ContactNo'].'","Status":"'.$ind_row['Status'].'"},';

$response = rtrim($response,',').']}';

echo $response;


?>
