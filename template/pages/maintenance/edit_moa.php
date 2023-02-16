<?php 
include('../../includes/dbcon.php');

$get_id=$_GET['moa_id'];
?>

<?php
if (isset($_POST['submit1'])) {
$subject1 = mysqli_real_escape_string($con,$_POST['moa1']);
$result1=mysqli_query($con,"select * from tbl_moa WHERE moa='$subject1' ") or die (mySQL_error());
$row1=mysqli_num_rows($result1);

if ($row1 > 0)
{
echo "<script>alert('MOA already Exist!'); window.location='moa.php'</script>";
}
else
{       
    mysqli_query($con,"UPDATE tbl_moa SET moa = '$subject1' where moa_id = $get_id")or die(mysql_error());
    echo "<script>alert('MOA successfully updated!'); window.location='moa.php'</script>";
}
}          
  ?>