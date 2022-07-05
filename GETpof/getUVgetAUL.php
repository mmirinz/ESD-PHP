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
$calg3 = ($g1 - 15.07)/189.08; //189.08 อันนี้ใช้TESE
isset($_GET['res1'])? $res1 = $_GET['res1'] : $res1 = '';
echo $res1;
$g2 = (float)$res1;
$calg4 = ($g2 - 11.79)/173.37;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POF";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die ("Connection failed: " .$conn->connect_error);
}
//Table = POF1
$sql = "INSERT INTO pof1(`UVG1`,`AULG2`)VALUES('$calg3','$calg4')";  
$up = "UPDATE pof1 SET AFTG1='" . $calg5 . "',NDEG2='" . $calg6 . "' WHERE ID = '" . $id . "'";

if ($conn->query($sql)===TRUE){
    echo "New record created successfully" .$res1;
}else{
    echo "Error: " .$sql."=>" . $conn->error;
}

?>

</body>
</html>


