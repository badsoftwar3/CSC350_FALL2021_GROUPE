 <?php
 session_start();
 $user_data = check_login($conn);
    $_SESSION;

    function build_calendar($month, $year){
        $daysofweek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', );

        $firstdayofmonth = mktime(0,0,0,$month,1,$year);

        $numofdays = date('t', $firstdayofmonth);

        $datecomps = getdate($firstdayofmonth);

        $monthname = $datecomps['month'];

        $daysofweek = $datecomps['wday'];

        $datetoday = date('Y-m-d');

        $calendar = "<table class='table table-bordered'>";
        $calendar.="<center><h2>$monthname $year</h2></center>";
        $calendar.= "<a class = 'btn btn-xs btn-primary' href=?month=" .date('m')."&year=".date('Y').">Current Month</a>";
        $calendar.= "<a class = 'btn btn-xs btn-primary' href=?month=" .date('m' ,mktime(0,0,0,$month+1,1,$year))."&year=".date('Y', mktime(0,0,0,$month+1,1,$year)).">Next Month</a></center><br>";

        $calendar.= "<tr>";

        foreach($daysofweek as $day){
            $calendar.= "<th class='header'>$day</th>";
        }

        $calendar.= "</tr><tr>";

        if($daysofweek > 0){
            for($k=0; $k < $daysofweek; $k++){
                $calendar.= "<td></td>";
            }
        }

        $currday = 1;

        $month = str_pad($month, 2 , "0", STR_PAD_LEFT);

        while($currday <= $numofdays){

            if($daysofweek == 7){
                $daysofweek =0;
                $calendar.="</tr><tr>";
            }
            $currdayrel =  str_pad($month, 2 , "0", STR_PAD_LEFT);
            $date = "$year-$month-$currdayrel";

            $today = $date ==date('Y-m-d')?"today" :"";
            if($date<date('Y-m-d')){
                $calendar.="<td><h4>$currday</h4><button class='btn btn-danger btn-xs'>N/A</button>";
            }else{
                $calendar.="<td class='$today'><h4>$currday</h4><a href='book.php?date=".$date."' class='btn btn-danger btn-xs'>Select time slot</a>";
            }

            if($datetoday == $date){
                $calendar.= "<td><h4>$currday</h4>";
            }else{
                $calendar.= "<td><h4>$currday</h4>";   
            }
            $calendar.="</td>";

            $currday++;
            $daysofweek++;
        }

        if($daysofweek != 7){
            $daysleft = 7 - $daysofweek;
            for($i=0; $i< $daysleft; $i++){
                $calendar.= "<td></td>";
            }
        }

        $calendar.= "</tr>";
        $calendar.= "</tables>";

        echo $calendar;
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Residents</title>
    <style>
        table{
            table-layout: fixed;
        }

        .today{
            background-color: lightblue;
        }
    </style>
</head>
<body>
<h1>Already picked a timeslot? you can find it below!</h1>
<h3>Here is your selected time slot</h3>

   Hello <?php echo $user_data['user_name']; ?>

<h1> Welcome please select a time slot </h1>
<div>
    <div>
        <?php
        $datecomps = getdate();
        $month = $datecomps['mon'];
        $year = $datecomps['year'];
        echo build_calendar($month , $year); 

        ?>
    </div>
</div>

<a href="logout.php">Logout</a>


<br>

   
</body>
</html>

