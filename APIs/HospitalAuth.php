<?php
  
$id = $_POST['ID'];
$password = $_POST['PASSWORD'];
$regno = $_POST['RegNo'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$id = mysqli_escape_string($conn,$id);
$password = mysqli_escape_string($conn,$password);
$regno = mysqli_escape_string($conn,$regno);

$query = "SELECT * from HospitalAuth where RegNo = '".$regno."' and AdminId = '".$id."' and AdminPwd = '".$password."';";

$query = mysqli_query($conn,$query);
$Result = "";
$PermissionCode="";

while($ind_row =  mysqli_fetch_assoc($query)){	
	$Result = "AccExists";
	$PermissionCode=$ind_row['Permissions_Code'];
}
echo "{'Result':'".str_replace("'","\'",$Result)."','PermissionString':'".str_replace("'","\'",$PermissionCode)."'}";




?>
