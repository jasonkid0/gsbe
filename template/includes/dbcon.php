<?php
// $con=mysqli_connect('localhost','0pI&vwHnE','u733437513_zaira','u733437513_gsbe')or die(mysqli_error());

// $servername = "localhost";
// $username = "u733437513_zaira";
// $password = "0pI&vwHnE";
// $dbname = "u733437513_gsbe";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gsbe";

$con = new mysqli($servername, $username, $password, $dbname) or die($db->error);
?>