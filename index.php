<?php 

require_once 'C:\xampp\htdocs\Project\includes/dbh-inc.php';
require_once 'C:\xampp\htdocs\Project\includes/function-inc.php';

check_login($conn);
//doihavetime($conn);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Welcome Resident to the Homepage</title>
    <style>
        table{
            table-layout: fixed;
        }
        td{
             width: 30%;;
         }
        .today{
            background-color: lightblue;
        }
        
    </style>
</head>
<body>
    <?php $sql = "SELECT * FROM users;";
    $results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['time_slot'];
        }
    }else{
        echo "<h4>It seems like you dont have a time slot you can book one below!</h4>";
    }?>
    <center><h3>Welcome Resident from Apartment: <?php $sql = "SELECT * FROM users;";$results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['Apartment_num'];
        }

    }
    
    ?></h3></center>
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <?php 
                $datecomp = getdate();
                $month = $datecomp['mon'];
                $year = $datecomp['year'];
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
    <a href='logout.php'class='btn btn-danger btn-s'>Logout</a";
 
    
</body>
</html>