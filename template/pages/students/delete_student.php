<?php 

include('../../includes/dbcon.php');

$get_id=$_GET['user_id'];

mysqli_query($con,"delete from user where user_id = '$get_id' ")or die(mysql_error());

echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>