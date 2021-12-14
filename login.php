<?php 








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Residents to the Login page</title>
</head>
<body>

<section class="signup_form">
    <h2>Please login to laundry system</h2>
    <form action="includes/login-inc.php" method="POST">
        <input type="text" name="user_name" placeholder="UserName">
        <input type="password" name="pwd" placeholder="password">
        <input type="text" name="Apartment_num" placeholder="Enter your  Apartment Number">
        <button type="submit" name="submit">Log In</button>
        <a href="signup.php">Dont have an account click here to Signup!</a>
    </form>
    <?php
   if(isset($_GET["error"])) {
       if($_GET["error"] == "emptyinput"){
           echo "<p>Fill in all fields</p>";
       }
       elseif ($_GET["error"] == "wrongpassword"){
           echo "<p>Wrong Password</p>";
       }
   }
?>
</section>
    
</body>
</html>