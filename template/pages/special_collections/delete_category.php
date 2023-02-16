<?php 

include('../../includes/dbcon.php');

$get_id=$_GET['category_id'];

mysqli_query($con,"delete from categories where category_id = '$get_id' ")or die(mysql_error());

echo "<script>alert('Successfully Deleted!'); window.location='categories_special_collection.php'</script>";
?>