<?php 
include('../../includes/dbcon.php');

$get_id=$_GET['course_id'];
?>

<?php
if (isset($_POST['submit1'])) {
$subject1 = mysqli_real_escape_string($con,$_POST['cour1']);
$result1=mysqli_query($con,"select * from courses WHERE course_name='$subject1' ") or die (mySQL_error());
$row1=mysqli_num_rows($result1);

if ($row1 > 0)
{
echo "<script>alert('Course already Exist!'); window.location='courses_special_collection.php'</script>";
}
else
{       
    mysqli_query($con,"UPDATE courses SET course_name = '$subject1' where course_id = $get_id")or die(mysql_error());
    echo "<script>alert('Course successfully updated!'); window.location='courses_special_collection.php'</script>";
}
}          
  ?>