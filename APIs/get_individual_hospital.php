<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$Hospital = mysqli_escape_string($conn,$_POST['HOSPITAL']);

$query = "SELECT * from Hospitals where RegNo = '".$Hospital."';";
$query = mysqli_query($conn,$query);

$response="";

while($ind_row = mysqli_fetch_assoc($query)){
	    $response = '{"Name":"'.str_replace('"','\"',$ind_row['HName']).'","Address":"'.str_replace('"','\"',$ind_row['Address']).'","Contact":"'.str_replace('"','\"',$ind_row['Contact']).'","Rating":"'.str_replace('"','\"',$ind_row['Rating']).'","Website":"'.str_replace('"','\"',$ind_row['Website']).'"}';
}
echo $response;

?>
