
<?php


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$HID = mysqli_escape_string($conn,$_POST['Hospital']);

//Requests
$query = "SELECT md5(concat(Req_Id,Status)) as md5 from Requests where HospitalId = '".$HID."';";

$query = mysqli_query($conn,$query);
$md5_Request="";
while($ind_row = mysqli_fetch_assoc($query))
	        $md5_Request=$md5_Request.$ind_row['md5'];

$md5_Request = md5($md5_Request);


//Appointments
$query = "SELECT md5(concat(AppId,Status)) as md5 from Appointments where HospitalId = '".$HID."';";

$query = mysqli_query($conn,$query);
$md5_Appointments="";
while($ind_row = mysqli_fetch_assoc($query))
                $md5_Appointments=$md5_Appointments.$ind_row['md5'];

$md5_Appointments = md5($md5_Appointments);


//Ambulances
$query = "select md5(concat(AmbRegID,AmbID,AmbNo,AmbDes,AmbModel))as md5 from Ambulances where HospitalId = '".$HID."';";
$amb="";
$query = mysqli_query($conn,$query);

while($ind_row = mysqli_fetch_assoc($query))
	$amb=$amb.$ind_row['md5'];

$amb=md5($amb);


//Drivers
$query = "select md5(concat(DriverName,Address,DOB,License,Contact,EID))as md5 from DRIVERS where HospitalId = '".$HID."';";
$driver="";
$query = mysqli_query($conn,$query);

while($ind_row = mysqli_fetch_assoc($query))
        $driver=$driver.$ind_row['md5'];

$driver=md5($driver);



//OngoingRequests
$query = "SELECT AccReqRegID as i from  AcceptedRequests where Hospital = '".$HID."';";
$or="";
$query = mysqli_query($conn,$query);

while($ind_row = mysqli_fetch_assoc($query))
	$or=$or.$ind_row['i'];

$or = md5($or);




echo "{'MD5_Requests':'".$md5_Request."','MD5_Appointments':'".$md5_Appointments."','MD5_Drivers':'".$driver."','MD5_Ambulances':'".$amb."','MD5_Ongoing':'".$or."'}";


?>
