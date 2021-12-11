<?php 
session_start();

include("connect.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && ! empty($password) && !is_numeric($user_name)){

        $user_id= random_num(3);

        $query = "insert into users(user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query($conn ,$query);

        header("Location: login php");
        die;

    }else{
        echo "Erorr User information is invaild";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
</head>
<body>

<div>
    <form action="post">
        <div id="login-title">Login</div>
        <input id="box" type="text" name="user_name">
        <br>
        <input id="box" type="password" name="password">
         <br>
        <input id="SiGNup-submit" type="submit" value="Signup">

        <a href="login.php">Have an account? click here to sign in!</a>
    </form>
</div>
    
</body>
</html>