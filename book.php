<?php 
session_start();
$user_data = check_login($conn);
   $_SESSION;

   if(isset($_GET['date'])){
       $date = $_GET['date'];
   }

   if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $date = $_POST['dateNtime'];

    $query = "insert into users(user_id,user_name,password) values ('$user_id','$user_name','$password','$dateNtime')";

        mysqli_query($conn ,$query);

   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Select your Time:<?php echo date('F/d/Y', strtotime($date));?></h1><hr>
        <div class="row"> 
            <div class="col-md-6-col-md-offset-3">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for=""></label>

                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>