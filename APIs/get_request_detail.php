


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$RequestNo = mysqli_escape_string($conn,$_POST['ID']);

$Hospital="";
$Contact = "";
$Patient = "";
$Driver_name = "";
$Ambulance_no = "";
$Date = "";

$query = "SELECT * from Requests where Req_Id = '".$RequestNo."';";
$query = mysqli_query($conn,$query);

while($ind_row = mysqli_fetch_assoc($query)){
	$Hospital = $ind_row['HospitalId'];
	$Patient = $ind_row['PatientName'];
	$Date = $ind_row['DateTime']; 
}

$query = "SELECT HName,Contact from Hospitals where RegNo = '".$Hospital."';";
$query = mysqli_query($conn,$query);
while($ind_row = mysqli_fetch_assoc($query)){
	$Hospital = $ind_row['HName'];
	$Contact = $ind_row['Contact'];
}


$response = '{"Hospital":"'.str_replace('"','\"',$Hospital).'","Contact":"'.str_replace('"','\"',$Contact).'","Patient":"'.str_replace('"','\"',$Patient).'","Date":"'.str_replace('"','\"',$Date).'"}';
echo $response;

?>
