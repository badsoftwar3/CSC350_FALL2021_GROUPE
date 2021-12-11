<?php 
session_start();

include("connect.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && ! empty($password) && !is_numeric($user_name)){

        

        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($conn ,$query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] == $password){

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index .php");
                    die;
                }
            }
        }
        echo "Incorrect Username or password";
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
    <title>Log-In</title>
</head>
<body>

<div>
    <form action="post">
        <div id="login-title">Login</div>
        <input id="box" type="text" name="user_name">
        <br>
        <input id="box" type="password" name="password">
         <br>
        <input id="login-submit" type="submit" value="Login">

        <a href="signup.php">Dont have an account click here to Signup!</a>
    </form>
</div>
    
</body>
</html>