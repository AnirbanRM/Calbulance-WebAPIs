

<?php
  
$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$id = mysqli_escape_string($conn,$_POST['ID']);
$name = mysqli_escape_string($conn,$_POST['NAME']);
$email = mysqli_escape_string($conn,$_POST['EMAIL']);
$contact = mysqli_escape_string($conn,$_POST['CONTACT']);
$password = mysqli_escape_string($conn,$_POST['PASSWORD']);

if($password=="-1")
	$query = "UPDATE Users set Name = '".$name."', Email = '".$email."', Contact='".$contact."' where Reg = '".$id."';";
else
	$query = "UPDATE Users set Name = '".$name."', Email = '".$email."', Contact='".$contact."',Password = '".md5($password)."' where Reg = '".$id."';";

if(mysqli_query($conn,$query))
	echo "SUCCESS";


?>
