<?php 
require_once 'C:\xampp\htdocs\Project\includes/dbh-inc.php';
require_once 'C:\xampp\htdocs\Project\includes/function-inc.php';

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("Location: login.php");