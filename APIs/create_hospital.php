
<?php

$host = 'localhost';
$user = 'phpclient';
$dbpassword = 'P@$$VV0rD';
$dbname = 'Calbulance';

$conn = mysqli_connect($host,$user,$dbpassword,$dbname);

date_default_timezone_set("Asia/Kolkata");
$REGNO = date("YmdHis").rand(100000,999999);

$RegNo = mysqli_escape_string($conn,$REGNO);
$HName = mysqli_escape_string($conn,$_POST['HName']);
$RName = mysqli_escape_string($conn,$_POST['RName']);
$Owner = mysqli_escape_string($conn,$_POST['Owner']);
$Year = mysqli_escape_string($conn,$_POST['Year']);
$Land_Area = mysqli_escape_string($conn,$_POST['Land_Area']);
$Owner_Type = mysqli_escape_string($conn,$_POST['OwnerType']);
$Address = mysqli_escape_string($conn,$_POST['Address']);
$Count_Doctors = mysqli_escape_string($conn,$_POST['C_Doctors']);
$Count_Nurses = mysqli_escape_string($conn,$_POST['C_Nurses']);
$Count_Wardboys = mysqli_escape_string($conn,$_POST['C_Wardboys']);
$Count_AdmStaf = mysqli_escape_string($conn,$_POST['C_admin']);
$Count_HKeep = mysqli_escape_string($conn,$_POST['C_HKeep']);
$Count_OT = mysqli_escape_string($conn,$_POST['C_OT']);
$Count_Gen = mysqli_escape_string($conn,$_POST['C_Gen']);
$Count_ICU = mysqli_escape_string($conn,$_POST['C_ICU']);
$Count_CCU = mysqli_escape_string($conn,$_POST['C_CCU']);
$Count_BBlock = mysqli_escape_string($conn,$_POST['C_BuildBlocks']);
$Contact = mysqli_escape_string($conn,$_POST['Contact']);
$Master_ID = mysqli_escape_string($conn,$_POST['Master_ID']);
$Master_Pwd = mysqli_escape_string($conn,$_POST['Master_Pwd']);
$Pos_Lat = mysqli_escape_string($conn,$_POST['Lat']);
$Pos_Lng = mysqli_escape_string($conn,$_POST['Lng']);
$wh = mysqli_escape_string($conn,$_POST['AmbHrs']);
$web = mysqli_escape_string($conn,$_POST['Website']);

$query = "INSERT INTO Hospitals(RegNo,HName,RName,Owner,Year,Land_Area,Owner_Type,Address,Count_Doctors,Count_Nurses,Count_Wardboys,Count_AdmStaf,Count_HKeep,Count_OT,Count_Gen,Count_ICU,Count_CCU,Count_BBlock,Contact,Master_ID,Master_Pwd,Pos_Lat,Pos_Lng,WorkingHours,Website) values('".$RegNo."','".$HName."','".$RName."','".$Owner."',".$Year.",'".$Land_Area."','".$Owner_Type."','".$Address."',".$Count_Doctors.",".$Count_Nurses.",".$Count_Wardboys.",".$Count_AdmStaf.",".$Count_HKeep.",".$Count_OT.",".$Count_Gen.",".$Count_ICU.",".$Count_CCU.",".$Count_BBlock.",'".$Contact."','".$Master_ID."','".$Master_Pwd."',".$Pos_Lat.",".$Pos_Lng.",'".$wh."','".$web."');";

$query2 = "INSERT INTO HospitalAuth(RegNo,AdminID,AdminPwd,Acc_Type,Permissions_Code) values('".$RegNo."','".$Master_ID."','".$Master_Pwd."','M','P111111');";

if(mysqli_query($conn,$query) and mysqli_query($conn,$query2))
	echo "{'HID':'".$REGNO."'}";

else echo "{'HID':'-1'}";



?>
