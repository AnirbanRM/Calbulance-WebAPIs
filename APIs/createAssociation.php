<?php

$a =  $_POST['AmbulanceReg'];
$d = $_POST['DriverReg'];
$h = $_POST['Hospital'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$a = mysqli_escape_string($conn,$a);
$d = mysqli_escape_string($conn,$d);
$h = mysqli_escape_string($conn,$h);

$query = "INSERT INTO Associations(DriverReg,AmbulanceReg,Hospital) values(".$d.",".$a.",'".$h."');";

$query = mysqli_query($conn,$query);

if($query)
	echo "Success";






?>
