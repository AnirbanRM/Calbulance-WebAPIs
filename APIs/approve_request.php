
<?php

$hospital = $_POST['Hospital'];
$ambulance = $_POST['Ambulance'];
$driver = $_POST['Driver'];
$patient = $_POST['Patient'];
$address = $_POST['Address'];
$contact = $_POST['Contact'];
$request = $_POST['RequestNo'];

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$current_date = date("Y-m-d H:i:s");

$hospital = mysqli_escape_string($conn,$hospital);
$ambulance = mysqli_escape_string($conn,$ambulance);
$driver =  mysqli_escape_string($conn,$driver);
$patient =  mysqli_escape_string($conn,$patient);
$address = mysqli_escape_string($conn,$address);
$contact =  mysqli_escape_string($conn,$contact);
$request =  mysqli_escape_string($conn,$request);


$query = "INSERT INTO AcceptedRequests(DateTime,Hospital,Ambulance,Driver,PatientName,PatientAddress,Contact,RequestNo,Status) values('".$current_date."','".$hospital."','".$ambulance."','".$driver."','".$patient."','".$address."','".$contact."','".$request."','ACPT')";


$query = mysqli_query($conn,$query);

if($query)
	echo "Success";

?>
