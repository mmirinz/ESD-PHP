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
$calg1 = ($g1 - 15.07)/189.08; //189.08 อันนี้ใช้TESE
isset($_GET['res1'])? $res1 = $_GET['res1'] : $res1 = '';
echo $res1;
$g2 = (float)$res1;
$calg2 = ($g2 - 11.79)/173.37;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POF";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die ("Connection failed: " .$conn->connect_error);
}

$sqlCheck = "SELECT*from pof1 order by ID DESC limit 1";
$result = mysqli_query($conn,$sqlCheck);
$row = mysqli_fetch_array($result);
$id = $row["ID"];
//Table = POF1
$up = "UPDATE pof1 SET DTC1='" . $calg1 . "',DTC2='" . $calg2 . "'  WHERE ID = '" . $id . "'";

if ($conn->query($up)===TRUE){
    echo "New record created successfully" .$res1;
}else{
    echo "Error: " .$up."=>" . $conn->error;
}

?>
</body>
</html>


