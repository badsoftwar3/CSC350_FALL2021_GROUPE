<?php 

if (isset($_POST['submit'])) {
    
    $user_name = $_POST['user_name'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $Apartment_num = $_POST['Apartment_num'];

    

    require_once 'C:\xampp\htdocs\Project\includes/dbh-inc.php';
    require_once 'C:\xampp\htdocs\Project\includes/function-inc.php';


    if(emptysignup($user_name,$pwd,$cpwd,$Apartment_num ) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();

    }
    if(invaild_usernsme($user_name) !== false){
        header("location: ../signup.php?error=invaildusername");
        exit();
    }
    if(invaild_pwdmatch($pwd,$cpwd) !== false){
        header("location: ../signup.php?error=passwordnotmatch");
        exit();
    }
    if(invaild_apartment($Apartment_num) !== false){
        header("location: ../signup.php?error=invaildapartmentnumber");
        exit();
    }
    if(username_exist($conn,$user_name) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createuser($conn, $user_name ,$pwd, $Apartment_num);

}
else {
    header("location: ../signup.php");
    exit();
}