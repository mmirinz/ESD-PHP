<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
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
isset($_GET['dbcon'])? $dbcon = $_GET['dbcon'] :$dbcon ='UNIT';
isset($_GET['proname'])? $proname = $_GET['proname'] :$proname ='';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = $dbcon ;

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
    die ("Unknown Production Line : " . $dbname);
    
}else{
    echo  ("Average : " . $dbname."<br>");
}

$query = "SELECT*FROM u134 GROUP BY `ID` ORDER by id DESC LIMIT 20  "; // TIMESTAMP
$query_result = mysqli_query($conn,$query);
$sql = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u134  FROM u134 GROUP BY `ID` ORDER by id DESC LIMIT 20   ";
$result = $conn->query($sql);
$num = 1;
$sql2 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u89  FROM u89 GROUP BY `ID` ORDER by id DESC LIMIT 20   ";
$result2 = $conn->query($sql2);
$sql3 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u168 FROM u168 GROUP BY `ID` ORDER by id DESC LIMIT 20   ";
$result3 = $conn->query($sql3);
$sql4 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u139 FROM u139 GROUP BY `ID` ORDER by id DESC LIMIT 20   ";
$result4 = $conn->query($sql4);
$sql5 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u166 FROM u166 GROUP BY `ID` ORDER by id DESC LIMIT 20   ";
$result5 = $conn->query($sql5);

if ($result->num_rows>0 ){

            ?>
            <div class="container mt-5 text-white">
                <table class="table table-dark table-left table-striped">  
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>DATE</th>
                            <th>UNIT134</th>
                            <th>UNIT89</th>
                            <th>UNIT168</th>
                            <th>UNIT139</th>
                            <th>UNIT166</th>
                            
                            
                        </tr>
                    </thead>
          <?php 
         
          while( $row =mysqli_fetch_array($query_result )){
            if( $row1 =mysqli_fetch_array($result)){
              if( $row2 =mysqli_fetch_array($result2)){
                if( $row3 =mysqli_fetch_array($result3)){
                  if( $row4 =mysqli_fetch_array($result4)){
                    if( $row5 =mysqli_fetch_array($result5)){
         
            do{?>
                <div>
                    
                        <tr>
                            <td><?php echo $num;?></td>
                            <td><?php isset($row["DATE"])? $DATE= $row["DATE"] : $DATE = '';echo $DATE; ?></td>
                            <td><?php isset($row1["u134"])? $u134 = $row1["u134"] : $u134 = '';echo number_format($u134,3); ?></td>
                            <td><?php isset($row2["u89"])? $u89 = $row2["u89"] : $u89 = '';echo number_format($u89,3); ?></td>
                            <td><?php isset($row3["u168"])? $u168 = $row3["u168"] : $u168 = '';echo number_format($u168,3); ?></td>
                            <td><?php isset($row4["u139"])? $u139 = $row4["u139"] : $u139 = '';echo number_format($u139,3); ?></td>
                            <td><?php isset($row5["u166"])? $u166 = $row5["u166"] : $u166 = '';echo number_format($u166,3); ?></td>
                        
                        </div>
                        </tr>
                  
            
            <?php $num++;  
          
                    } while ($num>=10000);
                    }
                  }
                }
              }
            }
          }
        ?>
      

     
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
      
        function drawChart() {   
          var data = google.visualization.arrayToDataTable([
            ['DATE','u134','u89','u168','u139','u166'],    
            <?php 
             


                  $query1 = "SELECT*FROM u134 GROUP BY `ID` ORDER by id DESC LIMIT 10 ";  //TIME
                  $res = mysqli_query($conn,$query1);
                  $sql1 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u134 FROM u134 GROUP BY `ID`  ORDER by id DESC LIMIT 10 ";
                  $res1 = mysqli_query($conn,$sql1);
                  $sql2 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u89 FROM u89 GROUP BY `ID`  ORDER by id DESC LIMIT 10 ";
                  $res2= mysqli_query($conn,$sql2);
                  $sql3 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u168 FROM u168 GROUP BY `ID`  ORDER by id DESC LIMIT 10 ";
                  $res3= mysqli_query($conn,$sql3);
                  $sql4 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u139 FROM u139 GROUP BY `ID`  ORDER by id DESC LIMIT 10 ";
                  $res4= mysqli_query($conn,$sql4);
                  $sql5 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS u166 FROM u166 GROUP BY `ID`  ORDER by id DESC LIMIT 10 ";
                  $res5= mysqli_query($conn,$sql5);
                 
                  
                  while($data=mysqli_fetch_array($res)){
                    if($data1=mysqli_fetch_array($res1)){
                      if($data2=mysqli_fetch_array($res2)){
                        if($data3=mysqli_fetch_array($res3)){
                          if($data4=mysqli_fetch_array($res4)){
                            if($data5=mysqli_fetch_array($res5)){
                      
                          isset($data["DATE"])? $DATE = $data["DATE"] : $DATE= '';
                          isset($data1["u134"])? $u134 = $data1["u134"] : $u134 = '';
                          isset($data2["u89"])? $u89 = $data2["u89"] : $u89= '';
                          isset($data3["u168"])? $u168 = $data3["u168"] : $u168= '';
                          isset($data4["u139"])? $u139 = $data4["u139"] : $u139= '';
                          isset($data5["u166"])? $u166 = $data5["u166"] : $u166= '';
              
                            ?>
                            ['<?php echo  $DATE;?>',<?php echo $u134;?>,<?php echo $u89;?>,<?php echo $u168;?>,<?php echo $u139;?>,<?php echo $u166;?>],   
                            <?php
                          }
                        }
                      }
                    }
                  }
                }
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
    <body>
   
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