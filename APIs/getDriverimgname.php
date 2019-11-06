
<?php

$id = $_POST['DriverRegID'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$id = mysqli_escape_string($conn,$id);

$query = "SELECT IMG_Name,LICENSE_LOC from DRIVERS WHERE RegID='".$id."';";

$query = mysqli_query($conn,$query);

$responseString = "";


while($ind_row =mysqli_fetch_assoc($query))
$responseString = $responseString.'{"DP":"'.str_replace("'","\'",$ind_row['IMG_Name']).'","LIC":"'.str_replace("'","\'",$ind_row['LICENSE_LOC']).'"}';

echo $responseString;

?>
