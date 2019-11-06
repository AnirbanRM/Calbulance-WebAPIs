<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$id = mysqli_escape_string($conn,$_POST['ID']);
$password = md5($_POST['PWD']);

$query = "SELECT * from Users where Email = '".$id."' and Password = '".$password."';";
$query = mysqli_query($conn,$query);

if(mysqli_num_rows($query)==1){
	$response = '';
	while($ind_row=mysqli_fetch_assoc($query)){
		$response = '{"Name":"'.$ind_row['Name'].'","Email":"'.$ind_row['Email'].'","Contact":"'.$ind_row['Contact'].'","ID":"'.$ind_row['Reg'].'"}';
	}
	echo $response;
}
else
	echo "Failure";

?>
