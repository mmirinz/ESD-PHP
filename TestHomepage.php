<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOMEPAGE</title>
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
<div class="container-fluid p-1 text-white text-end" >   
    <div class="btn-group">
        <form method="get" action="home.php">
            <button type = "submit" class = "btn bg-dark  text-white"> Home Selection</button>
        </form>
        <form method=  "get" action="create.php">
            <button type ="submit" class = "btn bg-dark blue  text-white">Create Production</button>
        </form>
        <form method="get" action="del.php";>
            <button type="submit" class="btn bg-dark blue px-4 text-white">Delete Data</button>
        </form>
        <form method="get" action="save.php";>
            <button type="submit" class="btn bg-dark blue  px-5  text-white">Save</button>
        </form>
    </div>
    </head>
<div class="container-fluid p-1 bg-dark gray text-white text-center" ></div><br>  
<br>

<body>
<div class="text-center " >
<div class="font-weight-light">
    <div class="container-sm mt-2 border ">
    <div class="container tm-container-max-800 ">
        <div class="row ">
            <div class="col-12">
            <form action="showdata.php" method="get" >
                    <div class="tm-bg-black tm-form-block ">
                        <ul class="input-field mt-2 tm-home-left">
                        <li>
                            <label>        
                                <input  class="btn-large  px-5  text-left" placeholder="Select Production Line : " name="dbcon" type="text"/>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input  class=" btn-large  px-5  text-left " placeholder="Production Name : " name="proname" type="text"/>
                            </label>
                        </li>
                        </ul>
                        <div class="tm-flex-lr text-right ">
                    <a href="#" class="white-text small"></a>
                    <button type="submit" class="btn-large btn-large-white px-4 " name="submit">Search</button></form>
                    </div>
        </div><br><br>

                    <form action="showdataUNIT.php" >
                    <button type="submit" class="waves-effect btn-large">Production Line : Unit</button> 
                    </form><br> 
                    <form action="showdataPOF.php"  >
                    <button type="submit" class="waves-effect btn-large">Production Line : POF</button> 
                    </form> <br><br>
    </div>    
    </div>
</div>
</div><br><br> 
</body>
</html>

                



               