<?php 

include('../../includes/dbcon.php');

$get_id=$_GET['course_id'];

mysqli_query($con,"delete from courses where course_id = '$get_id' ")or die(mysqli_error($con));

echo "<script>alert('Successfully Deleted!'); window.location='courses_special_collection.php'</script>";
?>