


<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);
$Sno = mysqli_escape_string($conn,$_POST['Sno']);
$query = "SELECT AdminID,Username from HospitalAuth where Sno=".$Sno.";";

$query = mysqli_query($conn,$query);

$Username="";
$ID="";
while($ind_row=mysqli_fetch_assoc($query)){
	$Username = $ind_row['Username'];
	$ID = $ind_row['AdminID'];
	
}
echo "{'ID':'".str_replace("'","\'",$ID)."','Username':'".str_replace("'","\'",$Username)."'}";







?>
