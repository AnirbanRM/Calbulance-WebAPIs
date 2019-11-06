


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital = mysqli_escape_string($conn,$_POST['hos']);

$query = "SELECT HName from Hospitals where RegNo = '".$hospital."';";

$Name = "";

$query = mysqli_query($conn,$query);
while($ind_row = mysqli_fetch_assoc($query))
	$Name = $ind_row['HName'];

$query = "SELECT * from Doctors where HID = '".$hospital."';";

$query = mysqli_query($conn,$query);

$resp = '{"HName":"'.$Name.'","Doctors":[';

while($ind_row = mysqli_fetch_assoc($query))
	$resp = $resp.'{"Name":"'.$ind_row['Name'].'",Type:"'.$ind_row['Type'].'"},';

$resp = rtrim($resp,',');

$resp = $resp.']}';

echo $resp;


?>
