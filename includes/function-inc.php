<?php 

function emptysignup($user_name,$pwd,$cpwd,$Apartment_num ){
   $result;
    if(empty($user_name) || empty($pwd) ||empty($cpwd) || empty($Apartment_num)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function invaild_usernsme($user_name){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function invaild_pwdmatch($pwd,$cpwd){

    $result;

    if( $pwd != $cpwd){

        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function invaild_apartment($Apartment_num){

    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/", $Apartment_num)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

function username_exist($conn,$user_name){
    $sql = "SELECT * FROM users WHERE user_name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=Useralreadyhere");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s" , $user_name);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        return $row;

    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
function createuser($conn, $user_name ,$pwd, $Apartment_num){
    $sql = "INSERT INTO users (user_name,pwd,Apartment_num) Values(?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss" , $user_name ,$hashedpwd, $Apartment_num);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();
}

function emptylogin($user_name,$pwd,$Apartment_num ){

    $result ;
  
      if(empty($user_name) || empty($pwd) || empty($Apartment_num)){
  
          $result = true;
      }
      else{
          $result = false;
      }
      return $result;
  
  }
function loginuser($conn,$user_name,$pwd,){

    $user_exist = username_exist($conn,$user_name,$pwd);

    if($user_exist === false){
        header("location: ../login.php?error=loginfail");
        exit();
    }

    $pwdhashed = $user_exist["pwd"];

    $checkpwd = password_verify($pwd, $pwdhashed);

    if($checkpwd === false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkpwd === true){
        session_start();
        $_SESSION["user_id"] = $user_exist["user_id"];
        $_SESSION["user_name"] = $user_exist["user_name"];
        header("location: ../index.php");
        exit();

    }
}
function build_calendar($month,$year){
    $daysofweek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    $firstdayofmonth = mktime(0,0,0,$month,1,$year);

    $num_days = date('t',$firstdayofmonth);

    $datecomp = getdate($firstdayofmonth);

    $month_name = $datecomp['month'];

    $daysofweek = $datecomp['wday'];

    $datetoday = date('Y-m-d');

    $calendar="<table class ='table table-bordered'>";
    $calendar.= "<center><h2>$month_name $year</h2></center>";

    

    $calendar.= "<tr>";

    //foreach($daysofweek as $day){
      //  $calendar.="<th class='header'>$day</th>";
   // }

    $calendar.= "</tr><tr>";

    if($daysofweek > 0){
        for($k = 0; $k < $daysofweek; $k++){
            $calendar.="<td></td>";
        }
    }

    $curr_day = 1;

    $month = str_pad($month,2,"0",STR_PAD_LEFT);

    while($curr_day <= $num_days){

        if($daysofweek == 7){
            $daysofweek =0;
            $calendar.="</tr><tr>";
        }
        $curr_dayrel = str_pad($curr_day,2,"0",STR_PAD_LEFT);
        $date = "$year-$month-$curr_dayrel";
        $day_name = strtolower(date('l',strtotime($date)));
        $event_num =0;
        $today = $date = date('Y-m-d')? "today" : "";
        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$curr_day</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }else{
            $calendar.="<td class='$today'><h4>$curr_day</h4> <a href='book.php?date=".$date."'class='btn btn-success btn-xs'>Select time</a";
        }

        $calendar.="<td><h4>$curr_day</h4>";

        $calendar.="</td>";

        $curr_day++;
        $daysofweek++;
    }

    if($daysofweek != 7){
        $remaining_days = 7 -$daysofweek;

        for($i=0;$i<$remaining_days;$i++){
            $calendar.= "<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;



}
function check_login($conn)
{

    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";

        $res = mysqli_query($conn, $query);

        if($res && mysqli_num_rows($res) > 0){

            $user_data = mysqli_fetch_assoc($res);

            return $user_data;
        }
    }
}

function time_slot($conn){
    if(isset($_POST['submit']))
    {
        $time = $_POST['slot'];
        $sql = $conn -> prepare("INSERT into users (time_slot)
        values (:time)");
        $conn->begintransaction();
        $sql->execute(array(':time' =>$time));
        echo "<h2>Time slot Saved successfully</h2>";
        $conn->commit();
        

    }
    header("location: ../index.php");
    //$conn -> null;
}
function doihavetime($conn){
    $sql = "SELECT * FROM users;";
    $results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['time_slot'];
        }
    }else{
        echo "<h4>It seems like you dont have a time slot you can book one below!</h4>";
        
    }

}