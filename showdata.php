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
            <button type = "submit" class = "btn bg-dark  text-white"> Home Selection</button>
        </form>
        <form method=  "get" action="create.php">
            <button type ="submit" class = "btn bg-dark blue  text-white">Create Production</button>
        </form>
        <form method="get" action="del.php";>
            <button type="submit" class="btn bg-dark blue  text-white">Delete Data</button>
        </form>
        <form method="get" action="save.php";>
            <button type="submit" class="btn bg-dark blue  px-5  text-white">Save</button>
        </form>
    </div>

<div class="container-fluid p-1 bg-dark gray text-white text-center"></div><br>  
</div><br>
</head>
<body>
<div class="container-sm mt-2 border text-end"><br>
<?php
isset($_GET['dbcon'])? $dbcon = $_GET['dbcon'] :$dbcon ='';
isset($_GET['proname'])? $proname = $_GET['proname'] :$proname ='';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = $dbcon ;

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die ("Unknown Production Line : " . $dbname);
    
}else{
    echo ("Production Line : " . $dbname."<br>"); 
}
$num = 1;

if ($dbname == "UNIT"){
  $sql = "SELECT*from $proname  ORDER by id DESC LIMIT 20 ";
  $result1 =$conn->query($sql);
  // $query1 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`+`DFPG1`+`DFPG2`)/6 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20"; //ข้อมูลจากESP 3 ตัว
  $query1 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20";  ////ข้อมูลจากESP 2 ตัว
  $query1_result = mysqli_query($conn,$query1);
  if ($result1->num_rows>0 ){
      echo "Machine : " . $proname;
   
    ?>
    <div class="container mt-5 text-white">
        <table class="table table-dark table-left table-striped">  
        
            <thead>
                <tr>
                
                    <th>ID</th>  
                    <th>DATE</th>
                    <th>FM(G1)</th>
                    <th>FM(G2)</th>
                    <th>WELD(G1)</th>
                    <th>WELD(G2)</th>
                    <th>DFP(G1)</th>
                    <th>DFP(G2)</th>
                    <th>DAMP(G1)</th>
                    <th>DAMP(G2)</th>
                    <th>UDP(G1)</th>
                    <th>SAM(G2)</th>
                    <th>avg</th>


                </tr>
            </thead>
  <?php 
  
  while($row =$result1->fetch_assoc()){
    if($s=mysqli_fetch_array($query1_result)){
    do{?>
        <div>
                <tr>
                    
                    <td><?php echo $num ;?></td>
                    <td><?php isset($row["DATE"])? $DATE = $row["DATE"] : $DATE = '';echo $DATE; ?></td>
                    <td><?php isset($row["FMG1"])? $FMG1 = $row["FMG1"] : $FMG1 = '';echo $FMG1; ?></td>
                    <td><?php isset($row["FMG2"])? $FMG2 = $row["FMG2"] : $FMG2 = '';echo $FMG2; ?></td>
                    <td><?php isset($row["WDG1"])? $WDG1 = $row["WDG1"] : $WDG1 = '';echo $WDG1; ?></td>
                    <td><?php isset($row["WDG2"])? $WDG2 = $row["WDG2"] : $WDG2 = '';echo $WDG2; ?></td>
                    <td><?php isset($row["DFPG1"])? $DFPG1 = $row["DFPG1"] : $DFPG1 = '';echo $DFPG1; ?></td>
                    <td><?php isset($row["DFPG2"])? $DFPG2 = $row["DFPG2"] : $DFPG2 = '';echo $DFPG2; ?></td>
                    <td><?php isset($row["DAMPG1"])? $DAMPG1 = $row["DAMPG1"] : $DAMPG1 = '';echo $DAMPG1; ?></td>
                    <td><?php isset($row["DAMPG2"])? $DAMPG2 = $row["DAMPG2"] : $DAMPG2 = '';echo $DAMPG2; ?></td>
                    <td><?php isset($row["UDPG1"])? $UDPG1 = $row["UDPG1"] : $UDPG1 = '';echo $UDPG1; ?></td>
                    <td><?php isset($row["SAMG2"])? $SAMG2 = $row["SAMG2"] : $SAMG2 = '';echo $SAMG2; ?></td>
                    <td><?php isset($s["avg"])? $avg = $s["avg"] : $avg = '';echo number_format($avg,3); ?></td>
                   
                
                </div>
                </tr>
          
    
    <?php $num++;  

    } while ($num>=10000);
  }
}
        }?>
      

     
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
       
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
      
        function drawChart() {   
          var data = google.visualization.arrayToDataTable([
            ['DATE','FMG1','FMG2','WDG1','WDG2','avg'],
            // ['DATE','FMG1','FMG2','WDG1','WDG2','avg',`DFPG1`,`DFPG2`],    //เพิ่มUNIT   ,'DFPG1','DFPG2','DAMPG1','DAMPG2','UDPG1','SAMG2'
            <?php 
                  $query = "SELECT*from $proname  ORDER by id DESC LIMIT 20 ";
                  $res = mysqli_query($conn,$query);
                  // $queryavg = "SELECT avg.*FROM(SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`+`DFPG1`+`DFPG2`)/6 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20) AS avg";
                  $queryavg = "SELECT avg.*FROM(SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20) AS avg";
                  $queryavg_result = mysqli_query($conn,$queryavg);
                  $queryavg_result = mysqli_query($conn,$queryavg);
                  while($data=mysqli_fetch_array($res)){
                    if($s=mysqli_fetch_array($queryavg_result)){
                      
                      isset($data["DATE"])? $DATE = $data["DATE"] : $DATE= '';
                      isset($data["FMG1"])? $FMG1 = $data["FMG1"] : $FMG1= '';
                      isset($data["FMG2"])? $FMG2 = $data["FMG2"] : $FMG2= '';
                      isset($data["WDG1"])? $WDG1 = $data["WDG1"] : $WDG1= '';
                      isset($data["WDG2"])? $WDG2 = $data["WDG2"] : $WDG2= '';
                      isset($data["DFPG1"])? $DFPG1 = $data["DFPG1"] : $DFPG1= '';
                      isset($data["DFPG2"])? $DFPG2 = $data["DFPG2"] : $DFPG2= '';
                    //   isset($data["DAMPG1"])? $DAMPG1 = $data["DAMPG1"] : $DAMPG1= '';
                    //   isset($data["DAMPG2"])? $DAMPG2 = $data["DAMPG2"] : $DAMPG2= '';
                    //   isset($data["UDPG1"])? $UDPG1 = $data["UDPG1"] : $UDPG1= '';
                    //   isset($data["SAMG2"])? $SAMG2 = $data["SAMG2"] : $SAMG2= '';
                    isset($s["avg"])? $avg = $s["avg"] : $avg= '';
                      

            
                     
                  ?>
                  
                  ['<?php echo  $DATE;?>',<?php echo $FMG1;?>,<?php echo $FMG2;?>,<?php echo $WDG1;?>,<?php echo $WDG2;?>,<?php echo $avg;?> ],   
                  <?php
                  }}
                  ?>
              
          ]);
  
          var options = {
            title: 'RESISTANCE (Ω)',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>  </div>
      <div id="curve_chart" style="width: 1100px; height: 550px"></div>
      <br>
    </body>
            </table>
        </div><br>
        
    <?php  
  }else if($dbname=="POF"){
  $query = "SELECT*from $proname  ORDER by id DESC LIMIT 20 ";
  $query_result = mysqli_query($conn,$query);
  $query2 = "SELECT AVG(`DTC1`+`DTC2`+`UVG1`+`AULG2`)/4 AS avg FROM $proname GROUP BY `ID` ";  //Test ESP 2ตัวหาร4
  $query2_result = $conn->query($query2);
  if($query_result->num_rows>0 ){
 
      ?>
      <div class="coontainer mt-5 text-white">
          <table class="table table-dark table-left table-striped">
              <thesd>
                  <tr>
                      <th>ID</th>
                      <th>DATE</th>
                      <th>DTC(G1)</th>
                      <th>DTC(G2)</th>
                      <th>UV(G1)</th>
                      <th>AUL(G1)</th>
                      <th>AFT(G1)</th>
                      <th>NDE(G2)</th>
                      <th>avg</th>
          
                  

                  </tr>
              </thesd>
      <?php
      while($row = mysqli_fetch_array($query_result)){   
          if($ss=mysqli_fetch_array($query2_result)){
          do{?>
              <tr>
                  <td><?php echo $num ;?></td>
                  <td><?php isset($row["DATE"])? $DATE = $row["DATE"] : $DATE = "";echo $DATE; ?></td>
                  <th><?php isset($row["DTC1"])? $DTC1 = $row["DTC1"] : $DTC1 = "";echo $DTC1; ?></th>
                  <th><?php isset($row["DTC2"])? $DTC2 = $row["DTC2"] : $DTC2 = "";echo $DTC2; ?></th>
                  <th><?php isset($row["UVG1"])? $UVG1 = $row["UVG1"] : $UVG1 = "";echo $UVG1; ?></th>
                  <th><?php isset($row["AULG2"])? $AULG2 = $row["AULG2"] : $AULG2 = "";echo $AULG2; ?></th>
                  <th><?php isset($row["AFTG1"])? $AFTG1 = $row["AFTG1"] : $AFTG1 = "";echo $AFTG1; ?></th>
                  <th><?php isset($row["NDEG2"])? $NDEG2 = $row["NDEG2"] : $NDEG2 = "";echo $NDEG2; ?></th>
                  <th><?php isset($ss["avg"])? $avg = $ss["avg"] : $avg = "";echo number_format($avg,3);?></th>
              </tr>
      <?php $num++;       
          }while ($num>=10000);}

 
  }
}

?>
     
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
       
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
      
        function drawChart() {   
          var data = google.visualization.arrayToDataTable([
            ['DATE',`DTC1`,`DTC2`,`UVG1`,`AULG2`,'avg'],
        
            <?php 
             


                  $query = "SELECT*from $proname  ORDER by id DESC LIMIT 20 ";
                  $res = mysqli_query($conn,$query);
                  // $queryavg = "SELECT avg.*FROM(SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`+`DFPG1`+`DFPG2`)/6 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20) AS avg";
                  $queryavg = "SELECT avg.*FROM(SELECT AVG(`DTC1`+`DTC2`+`UVG1`+`AULG2`)/4 AS avg FROM $proname GROUP BY `ID` DESC LIMIT 20) AS avg";
                  $queryavg_result = mysqli_query($conn,$queryavg);
                  $queryavg_result = mysqli_query($conn,$queryavg);
                  while($data=mysqli_fetch_array($res)){
                    if($s=mysqli_fetch_array($queryavg_result)){
                      
                      isset($data["DATE"])? $DATE = $data["DATE"] : $DATE= '';
                      isset($data["DTC1"])? $DTC1 = $data["DTC1"] : $DTC1= '';
                      isset($data["DTC2"])? $DTC2 = $data["DTC2"] : $DTC2= '';
                      isset($data["UVG1"])? $UVG1 = $data["UVG1"] : $UVG1= '';
                      isset($data["AULG2"])? $AULG2 = $data["AULG2"] : $AULG2= '';
                      // isset($data["DFPG1"])? $DFPG1 = $data["DFPG1"] : $DFPG1= '';
                      // isset($data["DFPG2"])? $DFPG2 = $data["DFPG2"] : $DFPG2= '';
                    //   isset($data["DAMPG1"])? $DAMPG1 = $data["DAMPG1"] : $DAMPG1= '';
                    //   isset($data["DAMPG2"])? $DAMPG2 = $data["DAMPG2"] : $DAMPG2= '';
                    //   isset($data["UDPG1"])? $UDPG1 = $data["UDPG1"] : $UDPG1= '';
                    //   isset($data["SAMG2"])? $SAMG2 = $data["SAMG2"] : $SAMG2= '';
                    isset($s["avg"])? $avg = $s["avg"] : $avg= '';
                      

            
                     
                  ?>
                  
                  ['<?php echo  $DATE;?>',<?php echo $DTC1;?>,<?php echo $DTC2;?>,<?php echo $UVG1;?>,<?php echo $AULG2;?>,<?php echo $avg;?> ],   
                  <?php
                  }}
                  ?>
              
          ]);
  
          var options = {
            title: 'RESISTANCE (Ω)',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>  </div>
    <!-- <div class="container-fluid p-1 bg-secondary text-white text-end"> -->
      <div id="curve_chart" style="width: 1100px; height: 550px"></div>
      <br>
    </body>
    


            </table>
        </div><br>
        
    <?php  }else{
        echo "<td><font size =5>Not found data in Production </font></td>"."<font size=5>".$proname."</font>"."<br>";
       
      }

      ?>
</div><br><br>
</body>
</html>