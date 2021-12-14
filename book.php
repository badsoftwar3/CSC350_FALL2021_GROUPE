<?php

require_once 'C:\xampp\htdocs\Project\includes/dbh-inc.php';
require_once 'C:\xampp\htdocs\Project\includes/function-inc.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Select your time slot</title>
</head>
<body>
    <form method="post">
    <center>
    <h1>Please Select your Time slot</h1>
    <label for="">Time Slots</label>
    <select name="slot" id="">
    <option >---Time--</option>
    <option value="12:00am-3:00am">12:00am-3:00am</option>
    <option value="3:00am-6:00am">3:00am-6:00am</option>
    <option value="6:00am-9:00am">6:00am-9:00am</option>
    <option value="9:00am-12:00pm">9:00am-12:00pm</option>
    <option value="12:00pm-3:00pm">12:00pm-3:00pm</option>
    <option value="3:00pm-6:00pm">3:00pm-6:00pm</option>
    <option value="6:00pm-9:00pm">6:00pm-9:00pm</option>
    <option value="9:00pm-12:00pm">9:00pm-12:00pm</option>
   </select>
    <input type="submit" name="submit" value="Submit">
</center>
</form>

<a href='index.php'class='btn btn-success btn-m'>Home</a";
</body>
</html>
