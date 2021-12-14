<?php 








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Residents to the Sign-up page</title>
</head>
<body>

<section class="signup_form">
    <h2>Sign up</h2>
    <form action="includes/signup-inc.php" method="POST">
        <input type="text" name="user_name" placeholder="UserName">
        <input type="password" name="pwd" placeholder="password">
        <input type="password" name="cpwd" placeholder="repeatpassowrd">
        <input type="text" name="Apartment_num" placeholder="Enter your  Apartment Number">
        <button type="submit" name="submit">Sign Up</button>
        <a href="login.php">Have an account? click here to sign in!</a>
    </form>
<?php
   if(isset($_GET["error"])) {
       if($_GET["error"] == "emptyinput"){
           echo "<p>Fill in all fields</p>";
       }
       elseif ($_GET["error"] == "invaildusername"){
           echo "<p>Enter vaild username</p>";
       }
       elseif ($_GET["error"] == "passwordnotmatch"){
        echo "<p>Enter matching passwords</p>";
       }
        elseif ($_GET["error"] == "invaildapartmentnumber"){
            echo "<p>Enter vaild Apartment Number</p>";
        }
        elseif ($_GET["error"] == "stmtfailed"){
         echo "<p>something went wrong,  try again</p>";
        }
        elseif ($_GET["error"] == "usernametaken"){
            echo "<p>Username already used</p>";
        }
    elseif ($_GET["error"] == "none"){
        echo "<p>Account successfully created</p>";
    }      
   }
?>
</section>    
</body>
</html>