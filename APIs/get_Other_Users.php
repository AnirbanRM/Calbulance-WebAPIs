
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$RegNo = mysqli_escape_string($conn,$_POST['HospitalId']);

$query = "SELECT * from HospitalAuth where RegNo = '".$RegNo."';";

$query = mysqli_query($conn,$query);

$response="{'Users':[";


while($ind_row = mysqli_fetch_assoc($query))
	$response=$response."{'Sno':'".str_replace("'","\'",$ind_row['Sno'])."','Username':'".str_replace("'","\'",$ind_row['Username'])."','LoginID':'".str_replace("'","\'",$ind_row['AdminID'])."','Acc_Type':'".str_replace("'","\'",$ind_row['Acc_Type'])."'},";

$response=rtrim($response,',')."]}";

echo $response;

?>
