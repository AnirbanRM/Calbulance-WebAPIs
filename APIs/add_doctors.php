
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$JSONstr = $_POST['Doctors'];

$Jsonobj = json_decode($JSONstr,true);
$HID = $Jsonobj['HospitalID'];
echo $JSONstr;
$query = "INSERT INTO Doctors(HID,Name,Type) values ";

foreach($Jsonobj['Doctors'] as $K => $V)
    $query = $query."('".$HID."','".mysqli_escape_string($conn,$V['Name'])."','".mysqli_escape_string($conn,$V['Type'])."'),";

$query = rtrim($query,',').";";
mysqli_query($conn,$query);


?>
