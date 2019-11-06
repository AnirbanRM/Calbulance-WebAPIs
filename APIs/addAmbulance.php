<?php

$hospital_id = $_POST['HospitalId'];
$ambid = $_POST['AmbulanceId'];
$ambno = $_POST['AmbulanceNo'];
$ambmod = $_POST['AmbulanceModel'];
$ambdes = $_POST['AmbulanceDescription'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$hospital_id = mysqli_escape_string($conn,$hospital_id);
$ambid = mysqli_escape_string($conn,$ambid);
$ambno = mysqli_escape_string($conn,$ambno);
$ambmod = mysqli_escape_string($conn,$ambmod);
$ambdes = mysqli_escape_string($conn,$ambdes);

$query = "INSERT INTO Ambulances(HospitalId,AmbID,AmbNo,AmbModel,AmbDes) values('".$hospital_id."','".$ambid."','".$ambno."','".$ambmod."','".$ambdes."');";

$query = mysqli_query($conn,$query);

if($query){
	echo "Success";
}



?>
