<?php

$id = $_POST['RegId'];
$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$id = mysqli_escape_string($conn,$id);

$query = "DELETE FROM Ambulances where AmbRegID = '".$id."';";

mysqli_query($conn,$query);

$query = "DELETE FROM Associations where AmbulanceReg = '".$id."';";

mysqli_query($conn,$query);



?>
