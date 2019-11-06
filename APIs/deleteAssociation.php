<?php
  
$r = $_POST['RegId'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$r = mysqli_escape_string($conn,$r);

$query = "DELETE FROM Associations where RegID = '".$r."';";

$query = mysqli_query($conn,$query);

if($query)
	        echo "Success";






?>
