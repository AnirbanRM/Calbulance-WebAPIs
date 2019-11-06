

<?php

$regid = $_POST['RegID'];
$name = $_POST['Name'];
$address = $_POST['Address'];
$license = $_POST['License'];
$empid = $_POST['empid'];
$contact = $_POST['Contact'];
$DOB = $_POST['DOB'];
$img = $_POST['dp_filename'];
$lic = $_POST['lic_filename'];


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$regid = mysqli_escape_string($conn,$regid);
$name = mysqli_escape_string($conn,$name);
$address = mysqli_escape_string($conn,$address);
$license = mysqli_escape_string($conn,$license);
$empid = mysqli_escape_string($conn,$empid);
$contact = mysqli_escape_string($conn,$contact);
$img = mysqli_escape_string($conn,$img);
$lic = mysqli_escape_string($conn,$lic);

if(strcmp($img,"")==0 and strcmp($lic,"")==0)
$query = "UPDATE DRIVERS SET DriverName = '".$name."',Address = '".$address."',DOB = '".$DOB."',License = '".$license."',Contact = '".$contact."',EID = '".$empid."' WHERE RegID = '".$regid."';";

else if(strcmp($img,"")!=0 and strcmp($lic,"")==0)
$query = "UPDATE DRIVERS SET DriverName = '".$name."',Address = '".$address."',DOB = '".$DOB."',License = '".$license."',Contact = '".$contact."',EID = '".$empid."',IMG_Name='".$img."' WHERE RegID = '".$regid."';";

else if(strcmp($img,"")==0 and strcmp($lic,"")!=0)
$query = "UPDATE DRIVERS SET DriverName = '".$name."',Address = '".$address."',DOB = '".$DOB."',License = '".$license."',Contact = '".$contact."',EID = '".$empid."',LICENSE_LOC ='".$lic."' WHERE RegID = '".$regid."';";

else if(strcmp($img,"")!=0 and strcmp($lic,"")!=0)
$query = "UPDATE DRIVERS SET DriverName = '".$name."',Address = '".$address."',DOB = '".$DOB."',License = '".$license."',Contact = '".$contact."',EID = '".$empid."',IMG_Name = '".$img."',LICENSE_LOC ='".$lic."' WHERE RegID = '".$regid."';";


$query = mysqli_query($conn,$query);

if($query)
	echo "Success";






?>
