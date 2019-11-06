


<?php

$name = $_POST['NAME'];
$email = $_POST['EMAIL'];
$password = $_POST['PASSWORD'];


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$name = mysqli_escape_string($conn,$name);
$email = mysqli_escape_string($conn,$email);
$password = md5(mysqli_escape_string($conn,$password));


$query = "INSERT INTO Users(Name,Email,Password) values('".$name."','".$email."','".$password."');";

if(mysqli_query($conn,$query))
	        echo mysqli_insert_id($conn);


?>
