<?php
  
$regid = $_POST['RegID'];
$ambid = $_POST['AmbulanceId'];
$ambno = $_POST['AmbulanceNo'];
$ambmod = $_POST['AmbulanceModel'];
$ambdes = $_POST['AmbulanceDescription'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$regid = mysqli_escape_string($conn,$regid);
$ambid = mysqli_escape_string($conn,$ambid);
$ambno = mysqli_escape_string($conn,$ambno);
$ambmod = mysqli_escape_string($conn,$ambmod);
$ambdes = mysqli_escape_string($conn,$ambdes);

$query = "UPDATE Ambulances SET AmbID = '".$ambid."',AmbNo='".$ambno."',AmbModel = '".$ambmod."',AmbDes='".$ambdes."' WHERE AmbRegID = ".$regid.";";

$query = mysqli_query($conn,$query);

if($query)
	echo "Success";

?>
