<?php 

if(isset($_POST['submit'])){

    $user_name = $_POST["user_name"];
    $pwd = $_POST["pwd"];
    $Apartment_num = $_POST["Apartment_num"];

    require_once 'C:\xampp\htdocs\Project\includes/dbh-inc.php';
    require_once 'C:\xampp\htdocs\Project\includes/function-inc.php';


    if(emptylogin($user_name,$pwd,$Apartment_num) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginuser($conn,$user_name,$pwd,$Apartment_num);
}
else{
 header("location: ../login.php");



}