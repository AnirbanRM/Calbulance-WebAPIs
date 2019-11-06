<?php

$hospitalid = $_POST['HospitalId'];
$name = $_POST['Name'];
$address = $_POST['Address'];
$dob = $_POST['DOB'];
$license = $_POST['License'];
$contact = $_POST['Contact'];
$eid = $_POST['eid'];
$img_str = $_POST['img'];
$lic_str = $_POST['lic'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$query = "INSERT INTO DRIVERS(HospitalID,DriverName,Address,DOB,License,Contact,EID,IMG_Name,LICENSE_LOC) values('".$hospitalid."','".$name."','".$address."','".$dob."','".$license."','".$contact."','".$eid."','".$img_str."','".$lic_str."');";

$query = mysqli_query($conn,$query);

if($query){
	echo "Successfully Added";
}













?>
