<?php

$hospital_id = $_POST['HospitalId'];
$admin_id = $_POST['Administrator'];
$admin_pwd = $_POST['Password'];


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital_id = mysqli_escape_string($conn,$hospital_id);
$admin_pwd = mysqli_escape_string($conn,$admin_pwd);
$admin_id = mysqli_escape_string($conn,$admin_id);

$query = "SELECT * from HospitalAuth where RegNo = '".$hospital_id."' and AdminId = '".$admin_id."' and AdminPwd = '".$admin_pwd."';";

$query = mysqli_query($conn,$query);

if(mysqli_num_rows($query)==0)
	echo("Not authorized");
else{

	$response_str = '{"Requests" : [';
	$query = "SELECT * from Requests where HospitalId = '".$hospital_id."';";
	$query = mysqli_query($conn,$query);

	while($ind_row = mysqli_fetch_assoc($query)){
	$response_str = $response_str.'{"Req_Id" : "'.str_replace("'","\'",$ind_row['Req_Id']).'","DateTime" : "'.str_replace("'","\'",$ind_row['DateTime']).'","ClientId" : "'.str_replace("'","\'",$ind_row['ClientId']).'","PatientName" : "'.str_replace("'","\'",$ind_row['PatientName']).'","Address" : "'.str_replace("'","\'",$ind_row['Address']).'","Status" : "'.str_replace("'","\'",$ind_row['Status']).'","Contact" : "'.str_replace("'","\'",$ind_row['ContactNo']).'"},';

}

$response_str=rtrim($response_str,",").']}';
echo $response_str;

}



?>
