<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<?php

isset($_GET['dbcon'])? $dbcon = $_GET['dbcon'] :$dbcon ='';
isset($_GET['proname'])? $proname = $_GET['proname'] :$proname ='';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = $dbcon;

    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error){
        die ("Unknow Production Line : " . $dbname."<br>");
    }else{
        echo ("Production Line : ".$dbname."<br>");
    }
    $fileName = date("Ymd");
    header("Content-Type: application/x-msexcel; name=\"$fileName-$proname.xls\"");
    header("Content-Disposition: inline; filename=\"$fileName-$proname.xls\"");  
    header("Pragma: no-cache");  
    echo ("Production Name : " .$proname."<br><br>");

    
    $num = 1;
    if ($dbname == "UNIT"){
        $sql = "SELECT*from $proname ";
        $result1 =$conn->query($sql);
        $query1 = "SELECT AVG(`FMG1`+`FMG2`+`WDG1`+`WDG2`)/4 AS avg FROM $proname GROUP BY `ID` ";  //avg.
        $query1_result = $conn->query($query1); 
        
        
        if($result1->num_rows>0){
        ?><div class="coontainer mt-5 text-white">
            <table class="table table-dark table-left table-striped">
                <thesd>
                    <tr>
                        <th>ID</th>
                        <th>DATE</th>
                        <th>FM(G1)</th>
                        <th>FM(G2)</th>
                        <th>WD(G1)</th>
                        <th>WD(G1)</th>
                        <th>DFP(G1)</th>
                        <th>DFP(G2)</th>
                        <th>DAMP(G1)</th>
                        <th>DAMP(G2)</th>
                        <th>UDP(G1)</th>
                        <th>SAM(G2)</th>
                        <th>avg</th>

    
                    </tr>
                </thesd>
                <?php
        
        while($row=$result1->fetch_assoc()){
            if($s=mysqli_fetch_array($query1_result)){ 
            do{?>
                <tr>
                    <td><?php echo $num ;?></td>
                    <td><?php isset($row["DATE"])? $DATE = $row["DATE"] : $DATE = "";echo $DATE; ?></td>
                    <th><?php isset($row["FMG1"])? $FMG1 = $row["FMG1"] : $FMG1 = "";echo $FMG1; ?></th>
                    <th><?php isset($row["FMG2"])? $FMG2 = $row["FMG2"] : $FMG2 = "";echo $FMG2; ?></th>
                    <th><?php isset($row["WDG1"])? $WDG1 = $row["WDG1"] : $WDG1 = "";echo $WDG1; ?></th>
                    <th><?php isset($row["WDG2"])? $WDG2 = $row["WDG2"] : $WDG2 = "";echo $WDG2; ?></th>
                    <th><?php isset($row["DFPG1"])? $DFPG1 = $row["DFPG1"] : $DFPG1 = "";echo $DFPG1; ?></th>
                    <th><?php isset($row["DFPG2"])? $DFPG2 = $row["DFPG2"] : $DFPG2 = "";echo $DFPG2; ?></th>
                    <th><?php isset($row["UDPG1"])? $UDPG1 = $row["UDPG1"] : $UDPG1 = "";echo $UDPG1; ?></th>
                    <th><?php isset($row["SAMG2"])? $SAMG2 = $row["SAMG2"] : $SAMG2 = "";echo $SAMG2; ?></th>
                    <th><?php isset($row["DAMPG1"])? $DAMPG1 = $row["DAMPG1"] : $DAMPG1 = "";echo $DAMPG1; ?></th>
                    <th><?php isset($row["DAMPG2"])? $DAMPG2 = $row["DAMPG2"] : $DAMPG2 = "";echo $DAMPG2; ?></th>
                    <th><?php isset($s["avg"])? $avg = $s["avg"] : $avg = "";echo number_format($avg,3);?></th>
    
                
                </tr>
        <?php $num++;      
            }while ($num>=10000);
           }
        }

        }          
    }else if($dbname=="POF"){
        $query = "SELECT*from $proname";
        $query_result = mysqli_query($conn,$query);
        $query2 = "SELECT AVG(`DTC1`+`DTC2`+`UVG1`+`AULG2`)/4 AS avg FROM $proname GROUP BY `ID` ";
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
            while($row = mysqli_fetch_array($query_result)){   /// =$conn->query($sqll)
                if($PreAvg=mysqli_fetch_array($query2_result)){
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
                        <th><?php isset($PreAvg["avg"])? $avg = $PreAvg["avg"] : $avg = "";echo number_format($avg,3);?></th>
                    </tr>
            <?php $num++;       
                }while ($num>=10000);}

        
        }
    }
        
        ?>
                
        </table>
    </div>
<?php 
    }else{
        echo "<td><font size =5>Not found data in Production </font></td>"."<font size=5>".$proname."</font>"."<br>";
    
    }
           
            ?>
                    
            </table>
        </div>


</div>
</body>
</html>



