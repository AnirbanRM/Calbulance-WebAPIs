
<?php

$hospital = $_POST['HospitalId'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital = mysqli_escape_string($conn,$hospital);

$query = "SELECT * from AcceptedRequests where Hospital = '".$hospital."' and Status = 'ACPT';";

$query = mysqli_query($conn,$query);

$responseString = '{"Rides" : [';

while($ind_row = mysqli_fetch_assoc($query))

	$responseString = $responseString."{'ID':'".str_replace("'","\'",$ind_row['AccReqRegID'])."','DateTime':'".str_replace("'","\'",$ind_row['DateTime'])."','PatientName':'".str_replace("'","\'",$ind_row['PatientName'])."','PatientAddress':'".str_replace("'","\'",$ind_row['PatientAddress'])."','Contact':'".str_replace("'","\'",$ind_row['Contact'])."','Driver':'".str_replace("'","\'",$ind_row['Driver'])."','Ambulance':'".str_replace("'","\'",$ind_row['Ambulance'])."'},";

$responseString = rtrim($responseString,',').']}';

echo $responseString;

?>
