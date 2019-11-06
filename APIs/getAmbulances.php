<?php

$hospital_id = $_POST['HospitalId'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital_id = mysqli_escape_string($conn,$hospital_id);

$query = "SELECT * from Ambulances where HospitalID = '".$hospital_id."';";

$query = mysqli_query($conn,$query);

$response_str = '{"Ambulances" : [';

while($ind_row = mysqli_fetch_assoc($query)){
        $response_str = $response_str.'{"AmbRegID" : "'.str_replace("'","\'",$ind_row['AmbRegID']).'","AmbID" : "'.str_replace("'","\'",$ind_row['AmbID']).'","AmbNo" : "'.str_replace("'","\'",$ind_row['AmbNo']).'","AmbModel" : "'.str_replace("'","\'",$ind_row['AmbModel']).'","AmbDes" : "'.str_replace("'","\'",$ind_row['AmbDes']).'"},';

}

$response_str=rtrim($response_str,",").']}';
echo $response_str;





?>
