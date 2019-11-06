
<?php


$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

$HID = mysqli_escape_string($conn,$_POST['HospitalId']);
$UID = mysqli_escape_string($conn,$_POST['UserID']);

$query = "SELECT HName from Hospitals where RegNo = '".$HID."';";

$result = mysqli_query($conn,$query);

$hname = "";
$Acc_Type="";
$Username="";
$Sno = "";
while ($ind_row = mysqli_fetch_assoc($result))
	$hname = $ind_row['HName'];

$query = "SELECT Sno,Username,Acc_Type from HospitalAuth where RegNo = '".$HID."' and AdminID = '".$UID."';";

$result = mysqli_query($conn,$query);

while($ind_row = mysqli_fetch_assoc($result)){
	$Acc_Type = $ind_row['Acc_Type'];
	$Username=$ind_row['Username'];
	$Sno = $ind_row['Sno'];
}


echo "{'Sno':'".str_replace("'","\'",$Sno)."','HName':'".str_replace("'","\'",$hname)."','Username':'".str_replace("'","\'",$Username)."', 'Acc_Type':'".str_replace("'","\'",$Acc_Type)."'}";



?>
