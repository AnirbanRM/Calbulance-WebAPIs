<?php

$ReqID = $_POST['ReqID'];
$command = $_POST['command'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$ReqID = mysqli_escape_string($conn,$ReqID);
$command = mysqli_escape_string($conn,$command);

if(strcmp($command, "APPROVE")==0)
	mysqli_query($conn,"UPDATE Requests SET Status = 'A' where Req_Id = ".$ReqID.";");

else if(strcmp($command,"DECLINE")==0)
	mysqli_query($conn,"UPDATE Requests SET Status = 'D' where Req_Id = ".$ReqID.";");


?>
