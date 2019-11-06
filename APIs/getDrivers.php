<?php

$hospital_id = $_POST['HospitalId'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital_id = mysqli_escape_string($conn,$hospital_id);

$query = "SELECT * from DRIVERS where HospitalID = '".$hospital_id."';";

$query = mysqli_query($conn,$query);

$response_str = '{"Drivers" : [';

while($ind_row = mysqli_fetch_assoc($query)){
        $response_str = $response_str.'{"DriverRegID" : "'.str_replace("'","\'",$ind_row['RegID']).'","Name" : "'.str_replace("'","\'",$ind_row['DriverName']).'","Address" : "'.str_replace("'","\'",$ind_row['Address']).'","DOB" : "'.str_replace("'","\'",$ind_row['DOB']).'","License" : "'.str_replace("'","\'",$ind_row['License']).'","Contact" : "'.str_replace("'","\'",$ind_row['Contact']).'","EID":"'.str_replace("'","\'",$ind_row['EID']).'"},';

}

$response_str=rtrim($response_str,",").']}';
echo $response_str;





?>
