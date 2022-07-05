<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">

    <body id="home">
    <div class="container-sm p-2  text-white text-left"> <br>
        <h4>LEARN THE METHOD TO CREATE A SERVER <br> AND KEEP THE DATA BY WAY OF Wi-Fi</h4>
        <h6>ELECTROSTATIC DISCHARGE TESTER</h6><br>
    </div>
<div class="container-fluid p-1   text-white text-end">
    <div class="btn-group">
        <form method="get" action="home.php">
            <button type = "submit" class = "btn bg-dark blue  text-white"> Home Selection</button>
        </form>
        <form method=  "get" action="create.php">
            <button type ="submit" class = "btn bg-dark  text-white">Create Production</button>
        </form>
        <form method="get" action="del.php";>
            <button type="submit" class="btn bg-dark blue px-4 text-white">Delete Data</button>
        </form>
        <form method="get" action="save.php";>
            <button type="submit" class="btn bg-dark blue  px-5 text-white">Save</button>
        </form>
    </div>

<div class="container-fluid p-1 bg-dark gray  text-center"></div><br>  
</div><br>
</head>
<body>
<div class="container-sm mt-2 border text-end"><br>

    <form action="" method="get">
        Select Production Line : <input type="char" name ="dbcon" class="tm-white text-dark"><br><br>
        Production Name : <input type="char" name="proname"class="tm-white text-dark"><br><br>
        <button type="submit" class="btn  bg-dark blue px-4 text-white">Create</button>
    </form><br>
    <?php 
    isset($_GET['dbcon'])? $dbcon = $_GET['dbcon'] : $dbcon ='';
    isset($_GET['proname'])? $proname = $_GET['proname'] : $proname ='';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = $dbcon;

    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error){
        die("Unknow Production line: " .$dbcon)."<br>";
    }else{
        echo "Production Line: " .$dbname ."<br>";
    }
    
    if ($dbname=="UNIT"){
    $sql = "CREATE TABLE `$proname` (
        ID INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FMG1 CHAR(5) NOT NULL,
        FMG2 CHAR(5) NOT NULL,
        WDG1 CHAR(5) NOT NULL,
        WDG2 CHAR(5) NOT NULL,
        DFPG1 CHAR(5) NOT NULL,
        DFPG2 CHAR(5) NOT NULL,
        DAMPG1 CHAR(5) NOT NULL,
        DAMPG2 CHAR(5) NOT NULL,
        UDPG1 CHAR(5) NOT NULL,
        SAMG2 CHAR(5) NOT NULL,
        avg CHAR(5) NOT NULL)";

    //    create POF  
    }else if($dbname=="POF"){
    $sql = "CREATE TABLE `$proname` (
        ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        DTC1 CHAR(5) NOT NULL,
        DTC2 CHAR(5) NOT NULL,
        UVG1 CHAR(5) NOT NULL,
        AULG2 CHAR(5) NOT NULL,
        AFTG1 CHAR(5) NOT NULL,
        NDEG2 CHAR(5) NOT NULL,
        avg CHAR(5) NOT NULL)"; 
    }if ($conn->query($sql)){
        echo "Create Production: " .$proname." successfully";
    }else{
        echo "Create Production: " .$proname. " failed";
    }


 
  
    ?>

</div>

   

</body>
</html>