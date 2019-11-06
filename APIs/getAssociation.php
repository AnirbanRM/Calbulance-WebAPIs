
<?php
  
$h = $_POST['Hospital'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$h = mysqli_escape_string($conn,$h);

$query = "SELECT AmbulanceReg,DriverReg,RegID from Associations where Hospital = '".$h."';";

$query = mysqli_query($conn,$query);

$responseString = '{"Associations" : [';

while($ind_row = mysqli_fetch_assoc($query))
	$responseString = $responseString."{'Ambulance':'".str_replace("'","\'",$ind_row['AmbulanceReg'])."','Driver':'".str_replace("'","\'",$ind_row['DriverReg'])."','R':'".str_replace("'","\'",$ind_row['RegID'])."'},";
$responseString = rtrim($responseString,',').']}';

echo $responseString;

?>
