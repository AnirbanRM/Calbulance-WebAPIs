


<?php



$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);


$X=$_POST['X'];
$Y = $_POST['Y'];

$X_min = doubleval($X)-0.25;
$X_max = doubleval($X)+0.25;

$Y_min = doubleval($Y)-0.25;
$Y_max = doubleval($Y)+0.25;

$query = "SELECT * from Hospitals where (Pos_Lat between ".$X_min." and ".$X_max.") and (Pos_Lng between ".$Y_min." and ".$Y_max.");";

$query = mysqli_query($conn,$query);

$response="{'Hospitals' : [";

while($ind_row = mysqli_fetch_assoc($query))
	$response = $response."{'ID':'".str_replace("'","\'",$ind_row['RegNo'])."','Name': '".str_replace("'","\'",$ind_row['HName'])."'},";

$response = rtrim($response,',')."]}";

echo $response;

