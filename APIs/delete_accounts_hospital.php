

<?php



$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Sno = mysqli_escape_string($conn,$_POST['Sno']);

$query = "DELETE FROM HospitalAuth where Sno=".$Sno.";";
mysqli_query($conn,$query);



?>
