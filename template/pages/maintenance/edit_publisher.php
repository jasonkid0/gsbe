<?php 
include('../../includes/dbcon.php');

$get_id=$_GET['publisher_id'];
?>

<?php
if (isset($_POST['submit1'])) {
$subject1 = mysqli_real_escape_string($con,$_POST['pub1']);
$result1=mysqli_query($con,"select * from tbl_publishers WHERE publisher='$subject1' ") or die (mySQL_error());
$row1=mysqli_num_rows($result1);

if ($row1 > 0)
{
echo "<script>alert('Publisher already Exist!'); window.location='publisher.php'</script>";
}
else
{       
    mysqli_query($con,"UPDATE tbl_publishers SET publisher = '$subject1' where publisher_id = $get_id")or die(mysql_error());
    echo "<script>alert('Publisher successfully updated!'); window.location='publisher.php'</script>";
}
}          
  ?>