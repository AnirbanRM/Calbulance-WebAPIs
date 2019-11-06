

<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$RequestNo = mysqli_escape_string($conn,$_POST['ID']);

$query = "SELECT * from AcceptedRequests where RequestNo = '".$RequestNo."';";
$query = mysqli_query($conn,$query);

$Driver = "";
$Ambulance="";

if(mysqli_num_rows($query)==0){
	$query = "SELECT * from Requests where Req_Id = '".$RequestNo."' and Status = 'D';";
	$query = mysqli_query($conn,$query);
	if(mysqli_num_rows($query)==0)
		echo "P";
	else
		echo "D";
}
else{

	while($ind_row = mysqli_fetch_assoc($query)){
		    $Driver = $ind_row['Driver'];
		        $Ambulance = $ind_row['Ambulance'];
	}

	$query = "SELECT AmbNo from Ambulances where AmbRegID = '".$Ambulance."';";
	$query = mysqli_query($conn,$query);
	while($ind_row = mysqli_fetch_assoc($query))
		    $Ambulance = $ind_row['AmbNo'];

	$query = "SELECT DriverName from DRIVERS where RegID = '".$Driver."';";
	$query = mysqli_query($conn,$query);
	while($ind_row = mysqli_fetch_assoc($query))
		    $Driver = $ind_row['DriverName'];    

	$response = '{"Status":"A","Driver":"'.str_replace('"','\"',$Driver).'","Ambulance":"'.str_replace('"','\"',$Ambulance).'"}';
	echo $response;
}

?>
