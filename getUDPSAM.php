<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    
<?php
isset($_GET['res'])? $res = $_GET['res'] : $res = '';
echo $res;
$g1 = (float)$res;
$calg9 = ($g1 - 15.07)/189.08; //189.08 อันนี้ใช้TESE
isset($_GET['res1'])? $res1 = $_GET['res1'] : $res1 = '';
echo $res1;
$g2 = (float)$res1;
$calg10 = ($g2 - 11.79)/173.37;
// $calUDPSAM= ($calg10+$calg9)/2;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UNIT";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die ("Connection failed: " .$conn->connect_error);
}

$up = "UPDATE U134 SET UDPG1='" . $calg9 . "',SAMG2='" . $calg10 . "' WHERE ID = '" . $id . "'";///,AVGu134 ='" . $calUDPSAM . "'
$sql = "UPDATE U134 SET DAMPG1='" . $calg7 . "',DAMPG2='" . $calg8 . "' WHERE ID = '" . $id . "'";

if ($conn->query($up)===TRUE){
    echo "New record created successfully" .$res1;
}else{
    echo "Error: " .$up."=>" . $conn->error;
}

?>

</body>
</html>


