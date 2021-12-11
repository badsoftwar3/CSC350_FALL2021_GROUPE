<?php 

function check_login($conn)
{

    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);

        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);

            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function random_num($length){

    $text = "";

    if($length < 1){
        $length = 1;
    }

    $len = rand(0,$length);

    for($i =0; $i< $len; $i++){

        $text .= rand(0,9);
    }

    return $text;
}