<?php 

$severname ="localhost";
$dbusername ="root";
$dbpass ="";
$dbname = "residents";


$conn = mysqli_connect($severname, $dbusername, $dbpass, $dbname);

if(!$conn) {

    die("Connection failed: ".mysqli_connect_error());
}