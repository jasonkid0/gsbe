<?php 

include('../../includes/dbcon.php');

$get_id=$_GET['pop_id'];

mysqli_query($con,"delete from tbl_placeofpublications where pop_id = '$get_id' ")or die(mysql_error());

echo "<script>alert('Successfully Deleted!'); window.location='pop.php'</script>";
?>