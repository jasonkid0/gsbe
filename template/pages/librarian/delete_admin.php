<?php 

include('../../includes/dbcon.php');

$get_id=$_GET['admin_id'];

mysqli_query($con,"delete from admin where admin_id = '$get_id' ")or die(mysql_error());

echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>